<?php

namespace App\Presenters;

use App\Transformers\NetworkMappingTransformer;

/**
 * Class NetworkMappingPresenter.
 *
 * @package namespace App\Presenters;
 */
class NetworkMappingPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new NetworkMappingTransformer();
    }
}
