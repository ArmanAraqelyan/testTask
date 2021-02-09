<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function index() {
        if (!Cache::has('tags')) {
            $tags = Tags::all();
            Cache::put('tags', $tags, now()->addMinutes(10));
        }else {
            $tags = Cache::get('tags');
        }
        return view('welcome', compact('tags'));
    }
}
