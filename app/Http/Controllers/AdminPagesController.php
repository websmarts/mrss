<?php

namespace App\Http\Controllers;

use App\Page;
use App\PageElement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminPagesController extends Controller
{
    public function index($pagename)
    {
        $page = Page::with('elements')->where('name', $pagename)->first();
        if (!$page) {
            flash('Page not found', 'danger');
            return redirect()->back();
        }

        // Slider images
        $dir = public_path('/images/slides');
        $slides = File::files($dir);

        return view('admin.pages.' . $pagename, ['page' => $page,'slides'=>$slides]);
    }

    public function update(Request $request)
    {
        $data = $request->data;

        foreach ($data as $element) {
            if ($element['id']) {

                $pageElement = PageElement::find($element['id']);

                $pageElement->update($element);
            }
        }
        return $request->all();
    }
}
