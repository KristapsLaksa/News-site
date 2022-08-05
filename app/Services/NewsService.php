<?php

namespace App\Services;

use App\Repositories\NewsApiRepository;
use App\Repositories\NewsRepository;
use GuzzleHttp\Exception\GuzzleException;

class  NewsService
{
    private NewsApiRepository $newsApiRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsApiRepository = $newsRepository;
    }

    /**
     * @throws GuzzleException
     */
    public function execute(): array
    {
        return $this->newsApiRepository->getTopHeadlines();
    }


}