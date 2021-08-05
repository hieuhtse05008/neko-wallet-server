<?php

namespace App\Presenters;

use App\Transformers\CoinMarketsDataTransformer;

/**
 * Class CoinMarketsDataPresenter.
 *
 * @package namespace App\Presenters;
 */
class CoinMarketsDataPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CoinMarketsDataTransformer();
    }
}
