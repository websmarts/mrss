<?php

namespace App\Http\Controllers;

use App\Page;
use App\Chunk;
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

        $testimonials = $this->testimonials();

        return view('admin.pages.' . $pagename, ['page' => $page,'slides'=>$slides,'testimonials'=>$testimonials]);
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

    protected function testimonials()
    {
        $testimonialChunks = Chunk::where('name','testimonials')->select('content')->get();
        $testimonialsData = explode('|',$testimonialChunks[0]['content']);
        $testimonials = [];
        foreach($testimonialsData as $t){
            $fields = explode('::',$t);
            if(is_array($fields) && count($fields) == 3 ){
                $testimonials[] = ['heading'=>$fields[0],'message'=>$fields[1],'who'=>$fields[2]];
            }            
        }
        return $testimonials;    
    }
}
