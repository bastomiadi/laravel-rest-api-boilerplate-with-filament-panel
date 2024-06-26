<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Response;

class ReviewController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index');
        $this->authorizeResource(Review::class, 'review');
    }

    public function index(Review $review)
    {   
        return ReviewResource::collection($review->with(['product', 'user'])->paginate(10));
    }

    public function store(ReviewRequest $request, Review $review)
    {
        return response([
            'data' => new ReviewResource(
                $review::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Review $review)
    {
        return new ReviewResource($review);
    }
    
    public function update(ReviewRequest $request, Review $review)
    {   

        $review->update($request->all());

        return response([
            'data' => new ReviewResource($review)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Review $review)
    {
        $review->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

}