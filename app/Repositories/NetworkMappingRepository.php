<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NetworkMappingRepository.
 *
 * @package namespace App\Repositories;
 */
interface NetworkMappingRepository extends RepositoryInterface
{
    /**
     * @param int $limit
     * @param array $filter
     * @param bool $disabledRequestCriteria
     * @return mixed
     */
    public function list($limit, array $filter = [], $disabledRequestCriteria = false);
}
