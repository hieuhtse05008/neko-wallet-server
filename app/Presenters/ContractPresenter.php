<?php

namespace App\Presenters;

use App\Transformers\ContractTransformer;

/**
 * Class ContractPresenter.
 *
 * @package namespace App\Presenters;
 */
class ContractPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContractTransformer();
    }
}
