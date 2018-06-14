<?php

namespace App\Http\Controllers\back;

use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    public function index(){
        $reviews = Review::with('user', 'product')->get();
        return view('back.reviews.index', compact('reviews'));
    }

    // Backend user has to validate the review before it will be shown on the website.
    public function validateReview($id){
        $review = Review::findOrFail($id);
        $review->validated = !$review->validated;
        $review->update();
        return redirect()->back();
    }

    public function destroy($id){
        Review::findOrFail($id)->delete();
        return redirect()->back();
    }
}
