<?php

namespace App\Presenters;

use App\Transformers\ExchangeGuideTransformer;

/**
 * Class ExchangeGuidePresenter.
 *
 * @package namespace App\Presenters;
 */
class ExchangeGuidePresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ExchangeGuideTransformer();
    }
}
