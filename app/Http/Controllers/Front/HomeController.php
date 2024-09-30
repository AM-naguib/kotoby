<?php

namespace App\Http\Controllers\Front;

use Notification;
use App\Models\Book;
use App\Models\User;
use App\Models\Author;
use App\Models\Review;
use App\Models\Section;
use App\Models\Favorite;
use App\Models\ReadBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Events\NewCommentReviewEvent;
use App\Notifications\ReviewNotification;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::get();

        return view('front.index', compact('books'));
    }


    public function single($slug)
    {

        $book = Book::where('slug', $slug)->first();

        return view('front.single', compact('book'));
    }

    public function sections()
    {
        $sections = Section::orderBy("id", "desc")->get();
        return view('front.sections', compact('sections'));
    }
    public function authors()
    {

        $authors = Author::orderBy("id", "desc")->get();
        return view('front.authors', compact('authors'));
    }

    public function page($type, $slug)
    {
        $model = "App\Models\\" . ucfirst($type);
        $data = $model::where('slug', $slug)->first();
        return view('front.page', compact('data'));
    }

    public function review(Request $request, $bookId)
    {

        $book = Book::where('id', $bookId)->first();

        $data = $request->validate([
            "rating" => "nullable|integer",
            "comment" => "nullable|string",
        ]);


        $data["user_id"] = auth()->user()->id;
        $data["book_id"] = $book->id;
        $review = Review::create($data);
        if (strlen($data["comment"]) <= 0) {
            $review->update([
                "status" => 1
            ]);
            return redirect()->back();
        }
        $admins = User::where('type', 'admin')->get();
        Notification::send($admins, new ReviewNotification($review));

        event(new NewCommentReviewEvent($review));
        return redirect()->back();
    }



    public function readBook($slug)
    {
        $book= Book::where('slug', $slug)->first();

        return view('front.read-book', compact('book'));
    }

    public function dowenBook($slug)
    {
        $book= Book::where('slug', $slug)->first();

        return view('front.dowen-book', compact('book'));
    }

    public function search(Request $request){
        $books = Book::where('title', 'like', '%' . $request->search . '%')->get();
        return view('front.search', compact('books'));
    }


    public function best(){
        $books = ReadBook::select('book_id', DB::raw('COUNT(*) as views_count'))
    ->groupBy('book_id')
    ->orderBy('views_count', 'desc')
    ->get();

    return view('front.best', compact('books'));
    }
}
