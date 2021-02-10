<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagsExportRequest;
use App\Models\Items;
use App\Models\Tags;
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

    public function tagExport(TagsExportRequest $request) {
        $tagsToFilter = $request->except('_token');
        if (isset($tagsToFilter['isset']) && isset($tagsToFilter['except'])) {

            $tags = Items::whereHas('tag', function ($q) use ($tagsToFilter) {
                            $q->whereIn('tag_id', $tagsToFilter['isset']);
                        }, '=', count($tagsToFilter['isset']))
                        ->whereDoesntHave('tag', function ($q) use ($tagsToFilter) {
                            $q->whereIn('tag_id', $tagsToFilter['except']);
                        })
                        ->get();
            dd($tags);
        }
        dd(111);
    }
}
