<?php

namespace App\Controllers;


use App\Models\News;
use App\Repositories\NewsApiRepository;
use App\Services\NewsService;
use App\Services\NewsUserService;
use App\Services\SubmitNewsService;
use App\Services\SubmitNewsServiceRequest;
use App\Views\View;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use GuzzleHttp\Exception\GuzzleException;

class NewsController
{

    private NewsService $service;
    private SubmitNewsService $submitNewsService;
    private NewsUserService $newsUserService;


    public function __construct(
        NewsService       $service,
        SubmitNewsService $submitNewsService,
        NewsUserService $newsUserService

    )
    {
        $this->service = $service;
        $this->submitNewsService = $submitNewsService;
        $this->newsUserService = $newsUserService;
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
                $_POST['title'],
                $_POST['description'],
                $_POST['author'],
                $_POST['url'],
                $_POST['urlToImage']
            )
        );
        header('Location:/');
    }


    /**
     * @throws Exception
     */
    public function showUser():View
    {
        return new View('news-show.twig', ['report' => $this->newsUserService->execute('')]);

    }



}







