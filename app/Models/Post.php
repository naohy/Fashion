<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{public function user() {
    return $this->belongsTo(User::class);
}
protected $fillable = [
    'title',
    'body',
    'url',
    'image',
];
public function followers()
{
    return $this->belongsToMany(User::class);
}
    use HasFactory;
}
