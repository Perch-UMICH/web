<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * This function returns skills that belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function skills() {
        return $this->hasMany('App\Student_Skill');
    }

    /**
     * Get the student record associated with the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function student() {
        return $this->hasOne('App\Student');
    }

    /**
     * Get the faculty record associated with the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function faculty() {
        return $this->hasOne('App\Faculty');
    }
}
