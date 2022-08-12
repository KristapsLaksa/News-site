<?php

namespace App\Services;

use App\Repositories\NewsUserRepository;
use Doctrine\DBAL\Exception;

class NewsUserService
{
    private NewsUserRepository $newsUserRepository;

    public function __construct(NewsUserRepository $newsUserRepository)
    {
        $this->newsUserRepository = $newsUserRepository;
    }


    /**
     * @throws Exception
     */
    public function execute(string $category): array
    {
        return $this->newsUserRepository->getTopHeadlines($category);
    }

}