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
        $this->authorizeResource(Classes::class, 'class');
    }

    public function index(Classes $class, Request $request)
    {
        return ClassesResource::collection(
            $class
            ->with(['sections', 'students', 'user', 'sections.class', 'students.class'])
            // ->filterByName($request->name)
            // ->filterByDetail($request->detail)
            ->paginate(10)
        );
    }

    public function store(ClassesRequest $request, Classes $class)
    {
        return response([
            'data' => new ClassesResource(
                $class::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Classes $class)
    {
        return new ClassesResource($class);
    }
    
    public function update(ClassesRequest $request, Classes $class)
    {   

        $class->update($request->all());

        return response([
            'data' => new ClassesResource($class)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Classes $class)
    {
        $class->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

}