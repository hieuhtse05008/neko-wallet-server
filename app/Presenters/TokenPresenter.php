<?php

namespace App\Presenters;

use App\Transformers\TokenTransformer;

/**
 * Class TokenPresenter.
 *
 * @package namespace App\Presenters;
 */
class TokenPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new TokenTransformer();
    }
}
