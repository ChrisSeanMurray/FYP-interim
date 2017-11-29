<?php

namespace App;

use App\School;
use App\Traits\HashidTrait;
use App\Traits\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'school_id', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dates = ['deleted_at'];

    public function getClassgroupsSelectDataAttribute()
    {
        return $this->classgroups->flatMap(function ($item, $key) {
            return [$item->hashid => $item->name];
        })->toArray();
    }

    /**********************************
    * Relationships
    **********************************/
    /**
    *Define User belongs to relationship with School
    *
    *@return object
    **/
    public function school()
    {
        return $this->belongsTo('\App\School');
    }

    /**
    *Define User has many Classgroupss
    *
    *@return object
    **/
    public function classgroups()
    {
        return $this->hasMany('\App\Classgroup');
    }
}
