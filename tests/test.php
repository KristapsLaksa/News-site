<?php

use App\Models\News;

test('article should work', function() {
    $article = new News('https://codelex.io', 'codelex', 'works or not', 'https://codelex.io','https://codelex.io/jpeg');
    expect($article->getTitle())->toBe('https://codelex.io');
    expect($article->getDescription())->toBe('codelex');
    expect($article->getAuthor())->toBe('works or not');
    expect($article->getUrl())->toBe('https://codelex.io');
    expect($article->getUrlToImage())->toBe('https://codelex.io/jpeg');

});