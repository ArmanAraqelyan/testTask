<?php


namespace App\Services\ExportService;


class ExportCSV implements ExportInterface
{
    public function export($data)
    {
        $fileName = 'items.csv';

        $headers = [
            "Content-type"        => "text/csv; charset=UTF-8",
            "Content-Encoding"    => "UTF-8",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['идентификатор_товара', 'название_товара'];

        $callback = function() use($data, $columns) {
            $file = fopen('php://output', 'w');
            fprintf($file, "\xEF\xBB\xBF");
            fputcsv($file, $columns);
            foreach ($data as $item) {
                $row['идентификатор_товара']  = $item->id;
                $row['название_товара'] = $item->name;

                fputcsv($file, [$row['идентификатор_товара'], $row['название_товара']]);
            }
            fclose($file);
        };

        return ["callback" => $callback, "headers" => $headers];
    }
}
