<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;
    
    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }
}
