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
        $this->authorizeResource(Student::class, 'student');
    }

    public function index(Student $student, Request $request)
    {
        return StudentResource::collection(
            $student
            ->with(['class', 'section', 'user', 'class.user', 'section.user'])
            // ->filterByName($request->name)
            // ->filterByDetail($request->detail)
            ->paginate(10)
        );
    }

    public function store(StudentRequest $request, Student $student)
    {
        return response([
            'data' => new StudentResource(
                $student::create(
                    $request->all()
                )
            )
        ],Response::HTTP_CREATED);
    }

    public function show(Student $student)
    {
        return new StudentResource($student);
    }
    
    public function update(StudentRequest $request, Student $student)
    {   

        $student->update($request->all());

        return response([
            'data' => new StudentResource($student)
        ],Response::HTTP_CREATED);

    }
   
    public function destroy(Student $student)
    {
        $student->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }

}