<?php

namespace App\Presenters;

use App\Transformers\SwapOrderTransformer;

/**
 * Class SwapOrderPresenter.
 *
 * @package namespace App\Presenters;
 */
class SwapOrderPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SwapOrderTransformer();
    }
}
