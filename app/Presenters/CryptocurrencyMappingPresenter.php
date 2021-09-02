<?php

namespace App\Presenters;

use App\Transformers\CryptocurrencyMappingTransformer;

/**
 * Class CryptocurrencyMappingPresenter.
 *
 * @package namespace App\Presenters;
 */
class CryptocurrencyMappingPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CryptocurrencyMappingTransformer();
    }
}
