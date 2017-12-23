<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    /**
     * This function returns faculties that belongs to a lab
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function faculties() {
        return $this->belongsToMany('App\Faculty','lab_faculties');
    }

    /**
     * This function returns students that belongs to a lab
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students() {
        return $this->belongsToMany('App\Student', 'lab_students');
    }

    /**
     * Get all skills this lab has
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills() {
        return $this->belongsToMany('App\Skill', 'lab_skills');
    }

    /**
     * Get all tags related to this lab
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags() {
        return $this->belongsToMany('App\Tag', 'lab_tags');
    }

    /**
     * Get all positions related to this lab
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function positions() {
        return $this->belongsToMany('App\Position', 'lab_positions');
    }
}