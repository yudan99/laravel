<?php

namespace App\Http\Controllers;

use App\Models\FileShare;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\FileShareRequest;
use App\Models\Fiel;
use App\Handlers\FileUploadHandler;
use Auth;

class FileSharesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$file_shares = FileShare::with('user')->paginate();
		return view('file_shares.index', compact('file_shares'));
	}

    public function show(FileShare $file_share)
    {
        return view('file_shares.show', compact('file_share'));
    }

	public function create(FileShare $file_share, User $user)
	{
		$fiel = Fiel::all();
	    return view('file_shares.create_and_edit', compact('file_share','fiel'));
	}

	public function store(FileShareRequest $request, Fiel $fiel)
	{
		$fiel->fill($request->all());
		$fiel->user_id = Auth::id();
		$fiel->save();
	    //$file_share = FileShare::create($request->all());
		return redirect()->route('file_shares.show', $file_share->id)->with('message', 'Created successfully.');
	}

	public function edit(FileShare $file_share)
	{
        $this->authorize('update', $file_share);
		return view('file_shares.create_and_edit', compact('file_share'));
	}

	public function update(FileShareRequest $request, FileUploadHandler $uploader, FileShare $file_share, User $user)
	{
        //dd($request->tem_path);

        $data = $request->all();

        if ($request->tem_path){
            $result = $uploader->save($request->tem_path,'tem_path', Auth::id());
            //dd($result);
            if ($result){
                $data['tem_path'] = $result['tem_path'];
            }
        }

        $file_share->update($data);

//	    $this->authorize('update', $file_share);
//		$file_share->update($request->all());

		return redirect()->route('file_shares.show', $file_share->id)->with('message', 'Updated successfully.');
	}

	public function destroy(FileShare $file_share)
	{
		$this->authorize('destroy', $file_share);
		$file_share->delete();

		return redirect()->route('file_shares.index')->with('message', 'Deleted successfully.');
	}
}
