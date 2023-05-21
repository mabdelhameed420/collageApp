<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Department;


class StudentController extends Controller
{

    public function store(Request $request)
    {
        $studentExists = Student::where('national_id', $request->national_id)->first();
        if ($studentExists) {
            return response()->json([
                'message' => 'Student already exists!',
                'data' => $studentExists
            ], 201);
        } else {
            $student = Student::create(
                [
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'national_id' => $request->national_id,
                    'email' => $request->email,
                    'phone_no' => $request->phone_no,
                    'level' => $request->level,
                    'state' => $request->state,
                    'department_code' => $request->department_code,
                    'department_id' => $request->department_id,
                    'password' => bcrypt($request->password),
                ]
            );

            if (request()->hasFile('image')) {
                $file = request()->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('images/users/', $filename);
                $student->image = $filename;
            }
            $student->save();
            return response()->json([
                'message' => 'Student created successfully!',
                'data' => $student,
                'password' => $request->password
            ], 201);
        }
    }

    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'national_id' => 'required',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone_no' => 'required',
            'level' => 'required',
            'state' => 'required',
            'department_code' => 'required',
            'department_id' => 'required'
        ]);

        $student->update($validatedData);
        return response()->json([
            'message' => 'Student updated successfully!',
            'data' => $student
        ], 200);
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return response()->json([
            'message' => 'Student deleted successfully',
            'data' => $student
        ], 201);
    }
    public function login(Request $request)
    {
        $student = Student::where('national_id', $request->national_id)->first();
        if ($student) {
            if (password_verify($request->password, $student->password)) {
                $department = Department::find($student->department_id);
                $student->department_name = $department->name;
                return response()->json([
                    'message' => 'Login successful!',
                    'data' => $student
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Login failed!',
                    'data' => $student
                ], 400);
            }
        } else {
            return response()->json([
                'message' => 'Login failed!',
                'data' => $student
            ], 400);
        }
    }
    // Get all students by department ID and course ID
    public function getAllStudentByDepartmentId(Request $request)
    {
        $students = Student::where('department_id', $request->department_id)->get();
        return response()->json([
            'message' => 'Students retrieved successfully',
            'data' => $students,
            'statue' => 200
        ]);
    }
}
