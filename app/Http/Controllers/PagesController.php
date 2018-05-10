<?php

namespace App\Http\Controllers;

use App\Page;
use App\Chunk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    public function index(Request $request)
    {
        $pagename = $request->segment(1);
        $page = Page::with('elements')->where('name', $pagename)->first();
        
        // Slider images
        $slides = $this->slides();

        // Testimonials
        $testimonials = $this->testimonials();


        return view("pages.{$pagename}", ['page' => $page,'slides'=>$slides,'testimonials'=>$testimonials]);

    }

    protected function slides()
    {
        $dir = public_path('/images/slides');
        return File::files($dir);
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
