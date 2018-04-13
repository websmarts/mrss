<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $pagename = $request->segment(1);
        $page = Page::with('elements')->where('name', $pagename)->first();
        
        // Slider images
        $dir = public_path('/images/slides');
        $slides = File::files($dir);
        //dd($slides);

        return view("pages.{$pagename}", ['page' => $page,'slides'=>$slides]);

    }
}
