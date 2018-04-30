<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminFileManagerController extends Controller
{
    public function index()
    {
        
        return view('admin.filemanager.index');
    }
}
