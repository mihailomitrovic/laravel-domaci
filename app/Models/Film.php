<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function directors()
    {
        return $this->belongsTo(Director::class);
    }

    public function genres()
    {
        return $this->belongsTo(Genre::class);
    }

}
