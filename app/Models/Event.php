<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $with = ['files'];
    public function files()
    {
        return $this->hasMany(EventFile::class);
    }
}
