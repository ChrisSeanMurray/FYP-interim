<?php

namespace App;

use App\Traits\HashidTrait;
use App\Traits\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes,HashidTrait,CommonModelMethods;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'classgroup_id'
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
    public function classgroup()
    {
         return $this->belongsTo('\App\Classgroup');
    }
}
