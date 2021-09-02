<?php

namespace App\Presenters;

use App\Transformers\NetworkTransformer;

/**
 * Class NetworkPresenter.
 *
 * @package namespace App\Presenters;
 */
class NetworkPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NetworkTransformer();
    }
}
