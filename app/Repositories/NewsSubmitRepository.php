<?php

namespace App\Repositories;
use App\Models\News;

class NewsSubmitRepository implements NewsRepository
{
    public function storeNews(News $news): void
    {
        $data = [
            [
                $news->getTitle(),
               $news->getDescription(),
               $news->getAuthor(),
               $news->getUrlToImage(),
               $news->getUrl(),

            ]
        ];
        $filename = 'data.csv';
        $f = fopen($filename, 'a');
        foreach ($data as $row) {
            fputcsv($f, $row);
        }
        fclose($f);
    }


    public function getTopHeadlines(string $category): array
    {
        return [];
    }
}