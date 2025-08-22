<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = ['name', 'email'];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
