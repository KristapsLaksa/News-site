<?php

namespace App\Repositories;

use App\Models\News;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Query\QueryBuilder;
use mysqli;

class NewsSubmitRepository implements NewsRepository
{


    /**
     * @throws Exception
     */
    public function storeNews(News $news): void
    {

        $connectionParams =
            [
                'dbname' => $_ENV["MYSQL_DB_NAME"],
                'user' => $_ENV["USER_MY_SQL"],
                'password' => $_ENV["MYSQL_PASSWORD"],
                'host' => $_ENV["MYSQL_HOST"],
                'driver' => $_ENV["MYSQL_DRIVER"]
            ];

        $conn = DriverManager::getConnection($connectionParams);
        $queryBuilder = $conn->createQueryBuilder();

        $queryBuilder->insert('articles')
            ->values([
                'title' => ':title',
                'description' => ':description',
                'author' => ':author',
                'image_url' => ':image_url',
                'url' => ':url',
            ])
            ->setParameters([
                'title'=>$news->getTitle(),
                'description'=>$news->getDescription(),
                'author'=>$news->getAuthor(),
                'image_url'=>$news->getUrlToImage(),
                'url'=>$news->getUrl(),
    ])
            ->executeQuery();


        /*$filename = 'data.csv';
        $f = fopen($filename, 'a');
        foreach ($data as $row) {
            fputcsv($f, $row);
        }
        fclose($f);*/
    }


    public function getTopHeadlines(string $category): array
    {
        return [];
    }
}