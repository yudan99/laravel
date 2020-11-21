<?php

namespace App\Http\Controllers;

use App\Models\Fiel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FielRequest;

class FielsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$fiels = Fiel::paginate();
		return view('fiels.index', compact('fiels'));
	}

    public function show(Fiel $fiel)
    {
        return view('fiels.show', compact('fiel'));
    }

	public function create(Fiel $fiel)
	{
		return view('fiels.create_and_edit', compact('fiel'));
	}

	public function store(FielRequest $request)
	{
		$fiel = Fiel::create($request->all());
		return redirect()->route('fiels.show', $fiel->id)->with('message', 'Created successfully.');
	}

	public function edit(Fiel $fiel)
	{
        $this->authorize('update', $fiel);
		return view('fiels.create_and_edit', compact('fiel'));
	}

	public function update(FielRequest $request, Fiel $fiel)
	{
		$this->authorize('update', $fiel);
		$fiel->update($request->all());

		return redirect()->route('fiels.show', $fiel->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Fiel $fiel)
	{
		$this->authorize('destroy', $fiel);
		$fiel->delete();

		return redirect()->route('fiels.index')->with('message', 'Deleted successfully.');
	}
}