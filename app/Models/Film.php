<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $guarderd = [];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function directors()
    {
        return $this->belongsTo(Director::class);
    }
}
