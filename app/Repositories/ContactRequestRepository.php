<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ContactRequestRepository.
 *
 * @package namespace App\Repositories;
 */
interface ContactRequestRepository extends RepositoryInterface
{
    /**
     * @param int $limit
     * @param array $filter
     * @param bool $disabledRequestCriteria
     * @return mixed
     */
    public function list($limit, array $filter = [], $disabledRequestCriteria = false);
}
