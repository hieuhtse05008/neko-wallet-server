<?php

namespace App\Presenters;

use App\Transformers\TokenPriceTransformer;

/**
 * Class TokenPricePresenter.
 *
 * @package namespace App\Presenters;
 */
class TokenPricePresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TokenPriceTransformer();
    }
}
