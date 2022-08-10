<?php

namespace App\Repositories;

use App\Models\News;

interface NewsRepository
{
public function getTopHeadlines(string $category):array;
public function storeNews(News $news):void;
}