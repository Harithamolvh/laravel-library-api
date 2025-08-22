<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
        protected $fillable = ['member_id', 'borrowed_at','book_id','returned_at','stock'];

        public function book()
        {
                return $this->belongsTo(Book::class);
        }

        public function member()
        {
                return $this->belongsTo(Member::class);
        }
}
