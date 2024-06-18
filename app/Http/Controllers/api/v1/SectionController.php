<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\SectionRequest;
use App\Http\Resources\SectionResource;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SectionController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('index');
        // $this->authorizeResource(Section::class, 'Section');
    }

    public function index(Section $Section, Request $request)
    {
        return SectionResource::collection(
            $Section
            ->with(['class', 'user', 'class.students'])
            // ->filterByName($request->name)
            // ->filterByDetail($request->detail)
            ->paginate(10)
        );
    }

    public function store(SectionRequest $request, Section $Section)
    {
        return response([
            'data' => new SectionResource(
                $Section::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Section $Section)
    {
        return new SectionResource($Section);
    }
    
    public function update(SectionRequest $request, Section $Section)
    {   

        $Section->update($request->all());

        return response([
            'data' => new SectionResource($Section)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Section $Section)
    {
        $Section->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

}