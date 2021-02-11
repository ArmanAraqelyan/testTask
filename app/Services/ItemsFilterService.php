<?php


namespace App\Services;


use App\Models\Items;

class ItemsFilterService
{
    public function getFilterItems($tagsToFilter) {
        $items = [];
        if (isset($tagsToFilter['isset']) || isset($tagsToFilter['except'])) {
            if (isset($tagsToFilter['isset'])) {
                $isset = $tagsToFilter['isset'];
                $items = Items::whereHas('tag', function ($q) use ($isset) {
                    $q->whereIn('tag_id', $isset);
                }, '=', count($isset));
            }
            if (isset($tagsToFilter['except'])) {
                $except = $tagsToFilter['except'];
                if (!empty($items)) {
                    $items = $items->whereDoesntHave('tag', function ($q) use ($except) {
                        $q->whereIn('tag_id', $except);
                    });
                }else {
                    $items = Items::whereDoesntHave('tag', function ($q) use ($except) {
                        $q->whereIn('tag_id', $except);
                    });
                }
            }
        }
        return $items;
    }
}
