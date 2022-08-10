<?php

namespace App\Controllers;


use App\Repositories\NewsApiRepository;
use App\Services\NewsService;
use App\Services\SubmitNewsService;
use App\Services\SubmitNewsServiceRequest;
use App\Views\View;
use GuzzleHttp\Exception\GuzzleException;

class NewsController
{

    private NewsService $service;
    private SubmitNewsService $submitNewsService;


    public function __construct(
        NewsService       $service,
        SubmitNewsService $submitNewsService

    )
    {
        $this->service = $service;

        $this->submitNewsService = $submitNewsService;
    }

    /**
     * @throws GuzzleException
     */
    public function show(string $category): View
    {

        return new View('news-show.twig', ['report' => $this->service->execute($category)]);

    }

    public function create(): View
    {
        return new View('submit-news-form.twig');

    }

    public function store(): void
    {
        $this->submitNewsService->execute(
            new SubmitNewsServiceRequest(
                'title',
                'description',
                'author',
                'url',
                'urlToImage'
            )
        );
        header('Location:/');
    }


}







