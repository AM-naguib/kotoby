<?php

namespace App\Http\Controllers\Dashboard;

use Storage;
use Validator;
use App\Models\Book;
use App\Models\Author;
use App\Models\Keyword;
use App\Models\Section;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::orderBy("id", "desc")->get();
        return view("dashboard.books.index", compact("books"));
    }

    public function create()
    {
        $sections = Section::orderBy("id", "desc")->get();
        $authors = Author::orderBy("id", "desc")->get();
        return view("dashboard.books.create", compact("sections", "authors"));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|unique:books,title",
            "section_name" => "nullable",
            "author_name" => "nullable",
            "image_url" => "nullable",
            "description" => "nullable",
            "no_pages" => "nullable",
            "lang" => "nullable",
            "size" => "nullable",
        ]);
        if ($request->section_name != null) {
            $section = Section::firstOrCreate(["name" => $request->section_name, "slug" => Str::slug($request->section_name)]);
        }
        if ($request->author_name != null) {
            $author = Author::firstOrCreate(["name" => $request->author_name, "slug" => Str::slug($request->author_name)]);
        }
        if ($request->hasFile("image_url")) {
            $image = $request->file('image_url');
            $imageName = hexdec(uniqid('')) . '.' . $image->getClientOriginalExtension();

            $imagePath = $image->storeAs('uploads', $imageName, 'public');

            $data["image_url"] = $imagePath;
        }
        $book = Book::create([
            "title" => $request->title,
            "section_id" => $section->id ?? null,
            "author_id" => $author->id ?? null,
            "slug" => Str::slug($request->title),
            "image_url" => $data["image_url"] ?? null,
            "description" => $request->description,
            "no_pages" => $request->no_pages,
            "lang" => $request->lang,
            "size" => $request->size
        ]);
        $this->addCustomKeywords($book);
        return to_route("dashboard.books.index")->with("success", "Book created successfully");
    }


    public function edit(Book $book)
    {

        $sections = Section::orderBy("id", "desc")->get();
        $authors = Author::orderBy("id", "desc")->get();
        return view("dashboard.books.edit", compact("book", "sections", "authors"));
    }

    public function update(Request $request, Book $book){
        $data = $request->validate([
            "title" => "required|unique:books,title," . $book->id,
            "section_name" => "nullable",
            "author_name" => "nullable",
            "image_url" => "nullable",
            "description" => "nullable",
            "no_pages" => "nullable",
            "lang" => "nullable",
            "size" => "nullable",
        ]);

        if ($request->section_name != null) {
            $section = Section::firstOrCreate(["name" => $request->section_name, "slug" => Str::slug($request->section_name)]);
        }
        if ($request->author_name != null) {
            $author = Author::firstOrCreate(["name" => $request->author_name, "slug" => Str::slug($request->author_name)]);
        }
        if ($request->hasFile("image_url")) {
            $image = $request->file('image_url');
            $imageName = hexdec(uniqid('')) . '.' . $image->getClientOriginalExtension();
            $data["image_url"] = $image->storeAs('uploads', $imageName, 'public');
        }
        $book->update([
            "title" => $request->title,
            "section_id" => $section->id ?? null,
            "author_id" => $author->id ?? null,
            "slug" => Str::slug($request->title),
            "image_url" => $data["image_url"] ?? null,
            "description" => $request->description,
            "no_pages" => $request->no_pages,
            "lang" => $request->lang,
            "size" => $request->size
        ]);
        return to_route("dashboard.books.index")->with("success", "Book updated successfully");
    }
    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return response()->json([
                "message" => "success"
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                "message" => "error"
            ], 422);
        }

    }

    public function addCustomKeywords($book){
        $author = $book->author->name ?? "";
        $titles = [
            "تحميل $book->title pdf",
            "رواية $book->title pdf",
            "تنزيل $book->title مجانا",
            "$book->title pdf",
            "$book->title $author",
            "رواية $book->title ل$author",
            "$book->title $author pdf"
        ];
        foreach ($titles as $title){
            Keyword::create([
                "name" => $title,
                "slug" => Str::slug($title),
                "book_id" => $book->id
            ]);
        }
        return true;
    }
}
