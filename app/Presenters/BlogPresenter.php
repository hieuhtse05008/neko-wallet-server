<?php

namespace App\Presenters;

use App\Transformers\BlogTransformer;

/**
 * Class BlogPresenter.
 *
 * @package namespace App\Presenters;
 */
class BlogPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BlogTransformer();
    }
}
