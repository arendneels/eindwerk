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
