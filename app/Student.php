<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

    /**
     * This function returns lab associated with a row in student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lab() {
        return $this->belongsTo(Lab::class);
    }

    /**
     * This function returns user associated with a row in student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all skills this student has
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills() {
        return $this->belongsToMany('App\Skill', 'student_skills');
    }

    /**
     * Get all tags (interests) this stduents has
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function interests() {
        return $this->belongsToMany('App\Tag', 'student_tags');
    }

}