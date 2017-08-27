<?php
/**
 * Created by PhpStorm.
 * User: han
 * Date: 8/20/17
 * Time: 4:24 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Student_Skill extends Model{
    protected $table = 'student_skills';

    /**
     * This function returns skill associated with a row // $student_skill->skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function skill() {
        return $this->belongsTo(Skill::class);
    }

    /**
     * This function returns user associated with a row in student_skill // $student_skill->user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }
}