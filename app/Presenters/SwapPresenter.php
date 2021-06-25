<?php

namespace App\Presenters;

use App\Transformers\SwapTransformer;

/**
 * Class SwapPresenter.
 *
 * @package namespace App\Presenters;
 */
class SwapPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new SwapTransformer();
    }
}
