<?php
/**
 * Created by PhpStorm.
 * User: han
 * Date: 8/2/17
 * Time: 9:04 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Resume extends Model {

    /**
     * This function returns user associated with a row in resume
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

}