<?php

namespace App\Http\Controllers;

use App\Chunk;
use Illuminate\Http\Request;

class AdminPasswordController extends Controller
{
    public function index()
    {
        //$chunks = Chunk::get(); // dont need to as done by view composer
        return view('admin.change_password');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'password' => 'required|confirmed|min:6',
        ]);

        $user = $request->user();
        $user->password = bcrypt($request->password);
        $user->save();
      
        flash('Password has been updated');
        return redirect()->back();

    }
}
