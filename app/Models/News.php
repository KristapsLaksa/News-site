<?php

namespace App\Models;

class News
{
    private string $title;
    private ?string $description;
    private ?string $author;
    private ?string $urlToImage;
    private ?string $url;

    public function __construct(string $title, ?string $description, ?string $author,?string $urlToImage,?string $url)
    {
        $this->title = $title;
        $this->description = $description;
        $this->author = $author;
        $this->urlToImage = $urlToImage;
        $this->url = $url;
    }

    function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }
    public function getUrlToImage(): ?string
    {
        return $this->urlToImage;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }
}