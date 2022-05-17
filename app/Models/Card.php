<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'text', 'cover_image'];

}
