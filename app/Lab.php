<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    /**
     * This function returns faculties that belongs to a lab
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function faculties() {
        return $this->hasMany('App\Faculty');
    }

    /**
     * This function returns students that belongs to a lab
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students() {
        return $this->hasMany('App\Student');
    }

    /**
     * Get all skills this lab has
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function skills() {
        return $this->belongsToMany('App\Skill', 'lab_skills');
    }
}