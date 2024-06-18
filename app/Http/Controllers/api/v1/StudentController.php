<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\StudentRequest;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends BaseController
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except('index');
        // $this->authorizeResource(Student::class, 'Student');
    }

    public function index(Student $Student, Request $request)
    {
        return StudentResource::collection(
            $Student
            ->with(['class', 'section', 'user', 'class.user', 'section.user'])
            // ->filterByName($request->name)
            // ->filterByDetail($request->detail)
            ->paginate(10)
        );
    }

    public function store(StudentRequest $request, Student $Student)
    {
        return response([
            'data' => new StudentResource(
                $Student::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Student $Student)
    {
        return new StudentResource($Student);
    }
    
    public function update(StudentRequest $request, Student $Student)
    {   

        $Student->update($request->all());

        return response([
            'data' => new StudentResource($Student)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Student $Student)
    {
        $Student->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

}