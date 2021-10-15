<?php

namespace App\Presenters;

use App\Transformers\RefBlogGroupTransformer;

/**
 * Class RefBlogGroupPresenter.
 *
 * @package namespace App\Presenters;
 */
class RefBlogGroupPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new RefBlogGroupTransformer();
    }
}
