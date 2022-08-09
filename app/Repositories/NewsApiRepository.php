<?php

namespace App\Repositories;

use App\Models\News;
use Dotenv\Dotenv;
use GuzzleHttp\Exception\GuzzleException;

class NewsApiRepository implements NewsRepository
{
    /**
     * @throws GuzzleException
     */
    public function getTopHeadlines(string $category): array
    {

        $apiKey =$_ENV['NEWS_API_KEY'];

        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', "https://newsapi.org/v2/top-headlines?country=us&category=$category&apiKey=$apiKey");
        $newsHeadlines = json_decode($response->getBody());

        $news = [];
        foreach ($newsHeadlines->articles as $headlines) {
            $news[] = new News(
                $headlines->title,
                $headlines->description,
                $headlines->author,
                $headlines->urlToImage,
                $headlines->url
            );
        }
        return $news;
    }


}