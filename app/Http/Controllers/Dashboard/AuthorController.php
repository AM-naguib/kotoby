<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Author;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::orderBy("id", "desc")->get();
        return view('dashboard.authors.index', compact('authors'));
    }

    public function store(Request $request)
    {

        $data = Validator::make($request->all(), [
            "name" => "required|unique:authors,name"
        ]);

        if ($data->fails()) {
            return response()->json([
                "message" => $data->errors()
            ], 422);
        }

        Author::create([
            "name" => $request->name,
            "slug" => Str::slug($request->name)
        ]);

        return response()->json([
            "message" => "success"
        ], 200);

    }


    public function update(Request $request, Author $author)
    {

        $data = Validator::make($request->all(), [
            "name" => "required|unique:authors,name," . $author->id
        ]);

        if ($data->fails()) {
            return response()->json([
                "message" => $data->errors()
            ], 422);
        }

        $author->update([
            "name" => $request->name,
            "slug" => Str::slug($request->name)
        ]);

        return response()->json([
            "message" => "success"
        ], 200);

    }

    public function destroy(Author $author)
    {
        $author->delete();
        return response()->json([
            "message" => "success"
        ], 200);
    }
}
