<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentCreateRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index() {
        // generiert eine DB-Abfrage z.B. SELECT * FROM students ORDER BY lastname
        $students = Student::orderBy('lastname')->get();

        return view('students.index', [
            'students' => $students,
        ]);
    }

    public function create(){
        return view('students.create');
    }

    public function store( StudentCreateRequest $request ){
        $student = Student::create($request->validated());

        return redirect()
            ->route('students.index')
            ->with('success', 'Student wurde angelegt');
    }
    
    public function show(Student $student){
        return view('students.show');
    }
    
    public function edit(Student $student){
        return view('students.edit', [
            'student' => $student,
        ]);
    }
    
    public function update( Request $request , Student $student ){
        $data = $request->validate([
            'firstname' => ['required', 'string', 'max:100'],
            'lastname'  => ['required', 'string', 'max:100'],
            'email'     => ['required', 'email'],
            'age'       => ['nullable', 'integer', 'min:16', 'max:90'],
            'matriculation_number' => [
                'required',
                'string',
                'max:20',
            ]
        ]);

        $student->update($data);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student wurde erfolgreich geändert.');
    }
    
    public function destroy(Student $student){

        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Der Student wurde gelöscht');
    }
}