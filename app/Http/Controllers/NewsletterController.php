<?php

namespace App\Http\Controllers;

use App\Newsletter_User;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = ['faculty' => [], 'student' => []];
        $users = Newsletter_User::all();
        foreach($users as $user) {
            if ($user->user_type == 'faculty') {
                $array['faculty'][] = ['first' => $user->first_name, 'last' => $user->last_name, 'email' => $user->email];
            } else {
                $array['student'][] = ['first' => $user->first_name, 'last' => $user->last_name, 'email' => $user->email];
            }
        }
        return json_encode($array, JSON_FORCE_OBJECT);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // validate form
        $this->validate(request(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'user_type' => 'required'
        ]);

        $new = false;
        $row = Newsletter_User::where('email', '=', $request->email)->first();
        if (!$row) {
            // new user
            $row = new Newsletter_User();
            $new = true;
        }
        // update info
        $row->first_name = $request->first_name;
        $row->last_name = $request->last_name;
        $row->email = $request->email;
        $row->user_type = $request->user_type;

        $user = User::where('email', '=', $request->email)->first();
        if ($user){
            $row->user_id = $user->id;
        }
        try {
            $row->save();
        } catch (QueryException $e) {
            // db exception
        }
        // redirect
        return redirect()->action('IndexController@index',array('interested' => true, 'new' => $new));
    }
}
