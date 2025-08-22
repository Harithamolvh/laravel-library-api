<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author_id','isbn','stock'];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

}
