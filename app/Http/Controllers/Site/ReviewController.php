<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ReviewStoreRequest;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
    protected $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function store(ReviewStoreRequest $request)
    {
        $review = $this->review;

        $review->user_id = auth()->user()->id;
        $review->product_id = decrypt($request->product_id);
        $review->naam = $request->naam;
        $review->text = $request->text;
        $review->rating = $request->beoordeling;

        $review->save();

        return redirect()->back();
    }
}
