<?php

namespace App\Presenters;

use App\Transformers\CryptocurrencyInfoTransformer;

/**
 * Class CryptocurrencyInfoPresenter.
 *
 * @package namespace App\Presenters;
 */
class CryptocurrencyInfoPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CryptocurrencyInfoTransformer();
    }
}
