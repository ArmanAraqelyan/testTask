<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagsExportRequest;
use App\Models\Tags;
use App\Services\ExportService\ExportInterface;
use App\Services\ItemsFilterService;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    private $itemsFilterService;

    public function __construct()
    {
        $this->itemsFilterService = new ItemsFilterService;
    }

    public function index() {
        if (!Cache::has('tags')) {
            $tags = Tags::all();
            Cache::put('tags', $tags, now()->addMinutes(10));
        }else {
            $tags = Cache::get('tags');
        }
        return view('welcome', compact('tags'));
    }

    public function tagExport(TagsExportRequest $request, ExportInterface $export) {
        $tagsToFilter = $request->except('_token');
        $items = $this->itemsFilterService->getFilterItems($tagsToFilter);
        if (!empty($items)) {
            $result = $items->get();
            if(!$result->isEmpty()) {
                $items->increment('show_count');
                $exportResponse = $export->export($result);
                return response()->stream($exportResponse['callback'], 200, $exportResponse['headers']);
            }
        }
        return redirect()->back()->withErrors(['emptyData' => 'No result for download']);
    }
}
