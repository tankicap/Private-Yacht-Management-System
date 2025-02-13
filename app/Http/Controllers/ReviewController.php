<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function index(Request $request){
        $status=$request->input('status');
        $reviews=Review::query()
            ->with('reservation.yacht')
            ->when($status,fn($query)=>$query->where('status',$status))
            ->paginate();
        return ReviewResource::collection($reviews);
    }
    public function store(ReviewRequest $request){
        $review=Review::query()->create($request->validated());
        return ReviewResource::make($review);
    }

}
