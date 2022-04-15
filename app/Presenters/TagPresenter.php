<?php

namespace App\Presenters;

use App\Presenters\Base\AbstractPresenter;
use App\Presenters\Base\PresenterItem;
use App\Repositories\TagsRepository;

class TagPresenter extends AbstractPresenter
{
    /**
     * @var TagsRepository
     */
    private TagsRepository $tags;

    /**
     * @param TagsRepository $tags
     */
    public function __construct(TagsRepository $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return array
     */
    public function index(): array
    {
        $tags = $this->tags->getList();
        $tags = new PresenterItem($tags, ['name', 'slug']);

        return [
            'tags' => $this->present($tags)
        ];
    }
}
