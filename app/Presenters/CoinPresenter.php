<?php

namespace App\Presenters;

use App\Transformers\CoinTransformer;

/**
 * Class CoinPresenter.
 *
 * @package namespace App\Presenters;
 */
class CoinPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CoinTransformer();
    }
}
