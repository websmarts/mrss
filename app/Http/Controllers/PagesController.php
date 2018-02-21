<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $pagename = $request->segment(1);
        $page = Page::with('elements')->where('name', $pagename)->first();

        return view("pages.{$pagename}", ['page' => $page]);

    }
}
