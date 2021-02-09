<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    use HasFactory;
    protected $table = "objects";

    public function attributes(){
        return $this->hasMany(Attribute::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
