<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\ClassesRequest;
use App\Http\Resources\ClassesResource;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClassesController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('index');
        // $this->authorizeResource(Classes::class, 'classes');
    }

    public function index(Classes $classes, Request $request)
    {
        return ClassesResource::collection(
            $classes
            ->with(['sections','students','user', 'sections.class', 'students.class'])
            // ->filterByName($request->name)
            // ->filterByDetail($request->detail)
            ->paginate(10)
        );
    }

    public function store(ClassesRequest $request, Classes $classes)
    {
        return response([
            'data' => new ClassesResource(
                $classes::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Classes $classes)
    {
        return new ClassesResource($classes);
    }
    
    public function update(ClassesRequest $request, Classes $classes)
    {   

        $classes->update($request->all());

        return response([
            'data' => new ClassesResource($classes)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Classes $classes)
    {
        $classes->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

}