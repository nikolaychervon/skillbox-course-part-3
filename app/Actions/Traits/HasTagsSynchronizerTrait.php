<?php

namespace App\Actions\Traits;

use App\Contracts\Actions\Article\TagsSynchronizeContract;
use App\Repositories\TagsRepository;
use Illuminate\Support\Collection;

trait HasTagsSynchronizerTrait
{
    /**
     * @var TagsSynchronizeContract
     */
    private TagsSynchronizeContract $tagsSynchronizeAction;

    /**
     * @param TagsSynchronizeContract $tagsSynchronizeAction
     */
    public function __construct(TagsSynchronizeContract $tagsSynchronizeAction)
    {
        $this->tagsSynchronizeAction = $tagsSynchronizeAction;
    }

    /**
     * @param string $tags
     * @return Collection
     */
    private function collectTags(string $tags): Collection
    {
        return collect(
            array_map(
                'trim',
                explode(',', $tags)
            )
        );
    }
}
