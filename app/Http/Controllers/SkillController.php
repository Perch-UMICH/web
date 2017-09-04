<?php

namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbSkills = Skill::all();
        $skills = array();
        foreach ($dbSkills as $skill) {
            $skills[$skill->id] = $skill->name;
        }
        return json_encode($skills);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate(request(), [
            'name' => 'required'
        ]);

        // save to db
        $skill = new Skill();
        $skill->name = $request->name;
        if ($skill->save()) {
            // generate response
            return json_encode(array('success' => true, 'id' => $skill->id, 'name' => $request->name));
        }

        else {
            return json_encode(array('success' => false, 'message' => 'Failed to save to database'));
        }
    }
}
