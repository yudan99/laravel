<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SectionRequest;

class SectionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$sections = Section::paginate();
		return view('sections.index', compact('sections'));
	}

    public function show(Section $section)
    {
        return view('sections.show', compact('section'));
    }

	public function create(Section $section)
	{
		return view('sections.create_and_edit', compact('section'));
	}

	public function store(SectionRequest $request)
	{
		$section = Section::create($request->all());
		return redirect()->route('sections.show', $section->id)->with('message', 'Created successfully.');
	}

	public function edit(Section $section)
	{
        $this->authorize('update', $section);
		return view('sections.create_and_edit', compact('section'));
	}

	public function update(SectionRequest $request, Section $section)
	{
		$this->authorize('update', $section);
		$section->update($request->all());

		return redirect()->route('sections.show', $section->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Section $section)
	{
		$this->authorize('destroy', $section);
		$section->delete();

		return redirect()->route('sections.index')->with('message', 'Deleted successfully.');
	}
}