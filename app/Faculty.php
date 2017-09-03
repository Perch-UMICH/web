<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model {

    /**
     * This function returns lab associated with a row in faculty
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lab() {
        return $this->belongsTo(Lab::class);
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