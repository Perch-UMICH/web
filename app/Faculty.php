<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model {

    /**
     * This function returns lab associated with a row in faculty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function labs() {
        return $this->belongsToMany('App\Lab', 'lab_faculties');
    }

    /**
     * This function returns user associated with a row in faculty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

}