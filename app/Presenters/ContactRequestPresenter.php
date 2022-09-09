<?php

namespace App\Presenters;

use App\Transformers\ContactRequestTransformer;

/**
 * Class ContactRequestPresenter.
 *
 * @package namespace App\Presenters;
 */
class ContactRequestPresenter extends Presenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ContactRequestTransformer();
    }
}
