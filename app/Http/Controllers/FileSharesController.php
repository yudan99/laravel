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

	public function store(FileShareRequest $request, FileUploadHandler $uploader, FileShare $file_share)
	{
        $st_path = $_FILES['tem_path']['name'];

	    $data= $request->all();

		$data['user_id'] = Auth::id();
        //$data['file_introduction'] = "test";
        $data['st_path'] = $st_path;
        $data['file_type'] = strtolower($request->tem_path->getClientOriginalExtension());

        if ($request->tem_path){
            $result = $uploader->save($request->tem_path,'tem_path', Auth::id());
            //dd($result);
            if ($result){
                $data['tem_path'] = $result['tem_path'];
            }
        }

	    $file_share = FileShare::create($data);
		return redirect()->route('file_shares.show', $file_share->id)->with('message', 'Created successfully.');
	}

	public function edit(FileShare $file_share)
	{
        $this->authorize('update', $file_share);
		return view('file_shares.create_and_edit', compact('file_share'));
	}

	public function update(FileShareRequest $request, FileUploadHandler $uploader, FileShare $file_share)
	{
        //$ccc = json_encode($_FILES);

        $st_path = $_FILES['tem_path']['name'];

        $data = $request->all();

        $data['st_path'] = $st_path;
        $data['file_type'] = strtolower($request->tem_path->getClientOriginalExtension());

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
