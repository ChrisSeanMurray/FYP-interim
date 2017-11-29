<?php

namespace App;

use App\User;
use App\Traits\HashidTrait;
use App\Traits\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use SoftDeletes,HashidTrait,CommonModelMethods;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'schools';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address'
    ];

    protected $dates = ['deleted_at'];


    /**********************************
    * Relationships
    **********************************/
    /**
    *Define School one to many relationship with Teacher
    *
    *@return object
    **/
    public function teachers()
    {
        return $this->hasMany('\App\User');
    }
}
