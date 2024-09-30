<?php

namespace App\Http\Controllers\Front;

use App\Models\Book;
use App\Models\Favorite;
use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    public function index(){

        $user = auth()->user();
        // dd($user->favorites->count());
        return view('front.user.my-profile', compact('user'));
    }


    public function myFavourites(){
        $user = auth()->user();
        return view('front.user.my-favourites', compact('user'));
    }



    public function myReviews(){
        $user = auth()->user();
        return view('front.user.my-reviews', compact('user'));
    }




    public function deleteReview($id){

        $review = Review::findOrFail($id);
        if ($review->user_id == auth()->user()->id) {
            $review->delete();
            return response()->json(['message' => 'Review deleted successfully'],200);
        }
        return response()->json(['message' => 'You are not authorized to delete this review'],401);
    }




    public function addFavourite($id){
        $user = auth()->user();
        $book = Book::findOrFail($id);

        Favorite::firstOrCreate([
            'user_id' => $user->id,
            'book_id' => $book->id
        ]);

        return response()->json(['message' => 'Book added to favourites'],200);
    }


    public function deleteFavourite($id){
        $user = auth()->user();
        $book = Book::findOrFail($id);
        $favorite = Favorite::where('user_id', $user->id)->where('book_id', $book->id)->first();
        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'Book removed from favourites'],200);
        }
        return response()->json(['message' => 'Book not found in favourites'],404);
    }



    public function settings(){

        $user = auth()->user();
        return view('front.user.my-settings', compact('user'));
    }


    public function updateSettings(Request $request){
        $user = auth()->user();
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            "username" => "required|unique:users,username," . $user->id,
            'password' => 'nullable|min:6',
        ]);
        if($data["password"] != null){
            $data["password"] = bcrypt($data["password"]);
        }else{
            unset($data["password"]);
        }
        $user->update($data);
        return back()->with('success', 'تم حفظ البيانات بنجاح');
    }
}
