<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'show_count'];
    public $timestamps = false;

    public function tag() {
        return $this->belongsToMany(Tags::class);
    }
}
