<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseCreateRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::orderBy('name')->get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseCreateRequest $request)
    {
        $course = Course::create($request->validated());

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kurs wurde angelegt');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', [
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'shortname'  => ['required', 'string', 'max:100'],
            'ects'     => ['nullable', 'integer', 'min:2', 'max:10'],
        ]);

        $course->update($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Kurs wurde erfolgreich geändert.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Der Kurs wurde gelöscht');
    }
}