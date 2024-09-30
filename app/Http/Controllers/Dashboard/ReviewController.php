<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function index(Request $request)
    {

        $reviews = Review::get();

        return view('dashboard.reviews.index', compact('reviews'));
    }

    public function requests(Request $request)
    {
        if ($request->search) {
            $reviews = Review::where("id", $request->search)->get();
        } else {
            $reviews = Review::where('status', 0)->get();
        }

        return view('dashboard.reviews.reviews-requests', compact('reviews'));
    }

    public function approve(Review $review)
    {
        $review->update([
            "status" => 1
        ]);
        return response()->json([
            "message" => "success"
        ], 200);
    }


    public function destroy(Review $review)
    {
        $review->delete();
        return response()->json([
            "message" => "success"
        ], 200);
    }



}
