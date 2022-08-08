<?php

namespace App\Repositories;

interface NewsRepository
{
public function getTopHeadlines(string $category):array;

}