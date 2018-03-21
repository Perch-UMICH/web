<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $interested = $request->interested;
        $new = $request->new;
        return view('welcome')->with('interested',$interested)->with('new',$new);
    }
}
