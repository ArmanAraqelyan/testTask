<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    public $timestamps = false;

    public function item() {
        return $this->belongsToMany(Items::class, 'item_tag_link', 'tag_id', 'item_id');
    }
}
