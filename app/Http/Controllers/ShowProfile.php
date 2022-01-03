<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ShowProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        $user = User::findOrFail($id);
        return view('profile', compact(['user']));
    }
}
