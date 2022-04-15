<?php

namespace App\Providers;

use App\Actions\Article\ArticleCreateAction;
use App\Actions\Article\ArticleDeleteAction;
use App\Actions\Article\ArticleUpdateAction;
use App\Actions\Article\TagsSynchronizeAction;
use App\Actions\Contact\ContactCreateAction;
use App\Contracts\Actions\Article\ArticleCreateContract;
use App\Contracts\Actions\Article\ArticleDeleteContract;
use App\Contracts\Actions\Article\ArticleUpdateContract;
use App\Contracts\Actions\Article\TagsSynchronizeContract;
use App\Contracts\Actions\Contact\ContactCreateContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    public array $singletons = [
        ArticleCreateContract::class => ArticleCreateAction::class,
        ArticleUpdateContract::class => ArticleUpdateAction::class,
        ArticleDeleteContract::class => ArticleDeleteAction::class,
        ContactCreateContract::class => ContactCreateAction::class,
        TagsSynchronizeContract::class => TagsSynchronizeAction::class,
    ];
}
