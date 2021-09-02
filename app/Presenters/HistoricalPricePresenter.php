<?php

namespace App\Presenters;

use App\Transformers\HistoricalPriceTransformer;

/**
 * Class HistoricalPricePresenter.
 *
 * @package namespace App\Presenters;
 */
class HistoricalPricePresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HistoricalPriceTransformer();
    }
}
