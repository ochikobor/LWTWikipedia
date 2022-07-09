<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Guideline;

class PostController extends Controller
{
    public function index(Request $request)
    {   
        $data = [];
        
        $keyword = $request->input('keyword');

        $query = Guideline::query();

        if (!empty($keyword)) {

            $query->where('title', 'like', '%'.$keyword.'%');
        }
        
        $data = $query->get();

        // ビューにusersとsearchを変数として渡す
        return view('lwtwikipedia.posts',compact('data','keyword'));


    }
}
