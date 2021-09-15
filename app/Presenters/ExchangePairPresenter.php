<?php

namespace App\Presenters;

use App\Transformers\ExchangePairTransformer;

/**
 * Class ExchangePairPresenter.
 *
 * @package namespace App\Presenters;
 */
class ExchangePairPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ExchangePairTransformer();
    }
}
