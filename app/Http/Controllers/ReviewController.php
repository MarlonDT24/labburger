<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $review = Review::all();
        return view('reviews.index', compact('review'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reviews.create', compact('review'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $review = new Review();
        $review->rating = $request->input('rating');
        $review->comments = $request->input('comments');
        $review->save();

        return redirect()->route('reviews.show', $review->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('reviews.index');
    }
}
