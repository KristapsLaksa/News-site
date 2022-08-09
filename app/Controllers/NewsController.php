<?php

namespace App\Controllers;


use App\Repositories\NewsApiRepository;
use App\Services\NewsService;
use App\Views\View;
use GuzzleHttp\Exception\GuzzleException;

class NewsController
{

    private NewsService $service;


    public function __construct(
        NewsService $service

    )
    {
        $this->service = $service;

    }

    /**
     * @throws GuzzleException
     */
    public function show(string $category): View
    {

        return new View('news-show.twig', ['report' => $this->service->execute($category)]);

    }

    public function create(): view
    {
        return new View('submit-news-form.twig');
    }






}







