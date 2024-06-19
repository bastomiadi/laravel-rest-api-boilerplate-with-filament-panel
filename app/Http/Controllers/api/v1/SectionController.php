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
        $this->authorizeResource(Section::class, 'section');
    }

    public function index(Section $section, Request $request)
    {
        return SectionResource::collection(
            $section
            ->with(['class', 'user', 'class.students'])
            // ->filterByName($request->name)
            // ->filterByDetail($request->detail)
            ->paginate(10)
        );
    }

    public function store(SectionRequest $request, Section $section)
    {
        return response([
            'data' => new SectionResource(
                $section::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Section $section)
    {
        return new SectionResource($section);
    }
    
    public function update(SectionRequest $request, Section $section)
    {   

        $section->update($request->all());

        return response([
            'data' => new SectionResource($section)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Section $section)
    {
        $section->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

}