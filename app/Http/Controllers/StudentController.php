<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function addStudent()
    {
        return view('app.add-student');
    }

    public function storeStudent(Request $request)
    {
        $this->validate($request, $this->student->rules);

        $image = $request->file('file');
        $name = $request->name;
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $student = new Student();
        $student->name = $name;
        $student->profileimage = $imageName;
        $student->save();
        return back()->with('student_added', 'Student record has been inserted');
    }

    public function students()
    {
        $students = Student::all();
        return view('app.all-students', compact('students'));
    }

    public function editStudent($id)
    {
        $student = Student::find($id);
        return view('app.edit-student', compact('student'));
    }
    public function updateStudent(Request $request)
    {
        $image = $request->file('file');

        if ($image) {
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
        }

        $student = Student::find($request->id);
        $student->name = $request->name;
        if ($image) $student->profileimage = $imageName;
        $student->save();
        return back()->with('student_updated', 'Student updated success');
    }

    public function deleteStudent($id)
    {
        $student = Student::find($id);
        unlink(public_path('images') . DIRECTORY_SEPARATOR . $student->profileimage);
        $student->delete();
        return back()->with('student_deleted', 'Student deleted successfully!');
    }
}
