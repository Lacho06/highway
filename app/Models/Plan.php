<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function features(){
        return $this->hasMany(Feature::class);
    }
}
