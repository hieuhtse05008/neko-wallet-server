<?php

namespace App\Presenters;

use App\Transformers\CryptocurrencyTransformer;

/**
 * Class CryptocurrencyPresenter.
 *
 * @package namespace App\Presenters;
 */
class CryptocurrencyPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CryptocurrencyTransformer();
    }
}
