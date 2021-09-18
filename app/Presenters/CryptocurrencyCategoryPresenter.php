<?php

namespace App\Presenters;

use App\Transformers\CryptocurrencyCategoryTransformer;

/**
 * Class CryptocurrencyCategoryPresenter.
 *
 * @package namespace App\Presenters;
 */
class CryptocurrencyCategoryPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CryptocurrencyCategoryTransformer();
    }
}
