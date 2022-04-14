<?php

namespace App\Providers;

use App\Actions\Article\ArticleCreateAction;
use App\Actions\Contact\ContactCreateAction;
use App\Contracts\Actions\Article\ArticleCreateContract;
use App\Contracts\Actions\Contact\ContactCreateContract;
use Illuminate\Support\ServiceProvider;

class ActionServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    public array $bindings = [
        ArticleCreateContract::class => ArticleCreateAction::class,
        ContactCreateContract::class => ContactCreateAction::class,
    ];
}
