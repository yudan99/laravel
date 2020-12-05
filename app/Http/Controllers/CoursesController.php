<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;

class CoursesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Course $course)
	{


        //$courses = $course->orderBy('created_at','desc')->with('edition')->paginate();

        $courses = Course::paginate();
		return view('courses.index', compact('courses'));
	}

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

	public function create(Course $course)
	{
		return view('courses.create_and_edit', compact('course'));
	}

	public function store(CourseRequest $request)
	{
		$course = Course::create($request->all());
		return redirect()->route('courses.show', $course->id)->with('message', 'Created successfully.');
	}

	public function edit(Course $course)
	{
        $this->authorize('update', $course);
		return view('courses.create_and_edit', compact('course'));
	}

	public function update(CourseRequest $request, Course $course)
	{
		$this->authorize('update', $course);
		$course->update($request->all());

		return redirect()->route('courses.show', $course->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Course $course)
	{
		$this->authorize('destroy', $course);
		$course->delete();

		return redirect()->route('courses.index')->with('message', 'Deleted successfully.');
	}
}
