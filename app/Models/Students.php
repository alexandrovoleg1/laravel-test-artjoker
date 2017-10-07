<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'student';

    protected $fillable = [
      'firstname', 'surname', 'email', 'nationality', 'address_id', 'course_id'
    ];

    public $timestamps = false;


    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function address()
    {

        return $this->hasOne(StudentAddresses::class, 'id');

    }
}
