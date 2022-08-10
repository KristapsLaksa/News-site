<?php

namespace App\Services;

use App\Repositories\NewsApiRepository;
use App\Repositories\NewsRepository;
use GuzzleHttp\Exception\GuzzleException;

class  NewsService
{
    private NewsApiRepository $newsApiRepository;

    public function __construct(NewsApiRepository $newsRepository)
    {
        $this->newsApiRepository = $newsRepository;
    }

    /**
     * @throws GuzzleException
     */
    public function execute(string $category): array
    {
        return $this->newsApiRepository->getTopHeadlines($category);
    }


}