<?php

namespace App\Services;

use App\Models\News;
use App\Repositories\NewsSubmitRepository;

class SubmitNewsService
{
    private NewsSubmitRepository $newsSubmitRepository;

    public function __construct(NewsSubmitRepository $newsSubmitRepository)
{

    $this->newsSubmitRepository = $newsSubmitRepository;
}
    public function execute(SubmitNewsServiceRequest $request): void
    {
        $article = new News(
            $request->getTitle(),
            $request->getDescription(),
            $request->getAuthor(),
            $request->getUrl(),
            $request->getUrlToImage()
        );

        $this->newsSubmitRepository->storeNews($article);
    }

}