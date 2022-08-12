<?php

namespace App\Repositories;

use App\Models\News;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;


class NewsUserRepository implements NewsRepository
{


    /**
     * @throws Exception
     */
    public function getTopHeadlines(string $category): array
    {


        $connectionParams =
            [
                'dbname'=>$_ENV["MYSQL_DB_NAME"],
                'user'=>$_ENV["USER_MY_SQL"],
                'password'=>$_ENV["MYSQL_PASSWORD"],
                'host'=>$_ENV["MYSQL_HOST"],
                'driver'=>$_ENV["MYSQL_DRIVER"]
            ];

        $conn = DriverManager::getConnection($connectionParams);
        $queryBuilder = $conn->createQueryBuilder();
        $articlesQuery = $queryBuilder
            ->select('*')
            ->from('articles')
            ->executeQuery()
            ->fetchAllAssociative();



        $news = [];
        foreach ($articlesQuery as $article) {
            $news[] = new News(
                (string)$article['title'],
                (string)$article['description'],
                (string)$article['author'],
                (string)$article['image_url'],
                (string)$article['url'],

            );
        }

        return $news;
    }


    public function storeNews(News $news): void
    {
        // TODO: Implement storeNews() method.
    }
}