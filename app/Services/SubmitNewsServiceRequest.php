<?php

namespace App\Services;

class SubmitNewsServiceRequest
{
    private string $title;
    private string $description;
    private string $url;
    private string $urlToImage;
    private string $author;

    public function __construct(string $title, string $description, string $author, string $url, string $urlToImage)
    {
        $this->title = $title;
        $this->description = $description;
        $this->url = $url;
        $this->urlToImage = $urlToImage;
        $this->author = $author;
    }


    public function getUrlToImage(): string
    {
        return $this->urlToImage;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getUrl(): string
    {
        return $this->url;
    }
}