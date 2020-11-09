<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Handlers\AvatarUploadHandler;

class PagesController extends Controller
{
    //
    public function root(User $user)
    {
        return view('pages.root', compact('user'));
    }
}
