<?php

namespace App;

use App\Lesson;
use App\Student;
use App\Traits\HashidTrait;
use App\Traits\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classgroup extends Model
{
    use SoftDeletes,HashidTrait,CommonModelMethods;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'classgroup';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name' ,'user_id'
    ];

    protected $dates = ['deleted_at'];


    /**********************************
    * Relationships
    **********************************/

    /**
    *Define Classgroups one to many relationship with Lesson
    *
    *@return object
    **/
    public function lessons()
    {
         return $this->hasMany('\App\Lesson');
    }

    /**
    *Define Classgroups one to one relationship with Teacher
    *
    *@return object
    **/
    public function teacher()
    {
        return $this->belongsTo('\App\User')->whereHas(
            'roles',
            function ($q) {
                $q->where('key', 'teacher');
            }
        );
    }

    /**
    *Define Classgroups one to one relationship with Teacher
    *
    *@return object
    **/
    public function students()
    {
        return $this->hasMany('\App\Student');
    }
}
