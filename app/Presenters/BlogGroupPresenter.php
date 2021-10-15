<?php

namespace App\Presenters;

use App\Transformers\BlogGroupTransformer;

/**
 * Class BlogGroupPresenter.
 *
 * @package namespace App\Presenters;
 */
class BlogGroupPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlogGroupTransformer();
    }
}
