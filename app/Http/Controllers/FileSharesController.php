<?php

namespace App\Http\Controllers;

use App\Models\FileShare;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileShareRequest;

class FileSharesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$file_shares = FileShare::paginate();
		return view('file_shares.index', compact('file_shares'));
	}

    public function show(FileShare $file_share)
    {
        return view('file_shares.show', compact('file_share'));
    }

	public function create(FileShare $file_share)
	{
		return view('file_shares.create_and_edit', compact('file_share'));
	}

	public function store(FileShareRequest $request)
	{
		$file_share = FileShare::create($request->all());
		return redirect()->route('file_shares.show', $file_share->id)->with('message', 'Created successfully.');
	}

	public function edit(FileShare $file_share)
	{
        $this->authorize('update', $file_share);
		return view('file_shares.create_and_edit', compact('file_share'));
	}

	public function update(FileShareRequest $request, FileShare $file_share)
	{
		$this->authorize('update', $file_share);
		$file_share->update($request->all());

		return redirect()->route('file_shares.show', $file_share->id)->with('message', 'Updated successfully.');
	}

	public function destroy(FileShare $file_share)
	{
		$this->authorize('destroy', $file_share);
		$file_share->delete();

		return redirect()->route('file_shares.index')->with('message', 'Deleted successfully.');
	}
}