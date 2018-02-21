<?php

namespace App\Http\Controllers;

use App\Chunk;
use Illuminate\Http\Request;

class AdminChunksController extends Controller
{
    public function index()
    {
        //$chunks = Chunk::get(); // dont need to as done by view composer
        return view('admin.chunks.index');
    }

    public function update(Request $request)
    {

        $chunks = collect($request->chunk);

        foreach ($chunks as $name => $value) {

            $chunk = Chunk::where('name', $name)->first();

            if ($chunk) {
                $chunk->content = $value;
                $chunk->save();
            }
        }
        flash('Chunks have been updated');
        return redirect()->back();

    }
}
