<?php

namespace App\Http\Middleware;

use App\Lab;
use Closure;

class EditLabPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $lab = Lab::find($request->route('lab'));

        // Find all faculty members of this lab
        $faculty = $lab->faculties;

        // Find faculties' user id
        $facultyid = array();
        foreach ($faculty as $faculty_member) {
            $facultyid[] = $faculty_member->user->id;
        }

        // Check if faculty has permission to edit, if not redirect to lab page
        if (!in_array(auth()->id(), $facultyid)) {
            $url = explode("/", $request->path());
            array_pop($url);
            $url = implode('/', $url);
            return redirect($url);
        }

        return $next($request);
    }
}
