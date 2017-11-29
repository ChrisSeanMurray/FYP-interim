<?php

namespace App;

use App\Classgroup;
use App\Traits\HashidTrait;
use App\Traits\CommonModelMethods;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesson extends Model
{
    use SoftDeletes,HashidTrait,CommonModelMethods;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'subject', 'points_question', 'points_level', 'questions', 'class_id'
    ];

    /**
    *Attributes that should be casted as different types
    *
    **/
    protected $casts = [
        'questions' => 'collection',
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
