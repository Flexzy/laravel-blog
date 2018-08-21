<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //Change table name
    protected $table = 'posts';

    //Change primary key
    public $primaryKey = 'id';

    //TimeStamps
    public $timestamps = true;


    public function user() {
        return $this->belongsTo('App\User');
    }

}
