<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Plan;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'plan_id'];

    public function plan(){
        return $this->belongsTo(Plan::class);
    }
}
