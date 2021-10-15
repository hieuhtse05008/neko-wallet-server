<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class BlogJoinGroupCriteria.
 *
 * @package namespace App\Criteria;
 */
class BlogJoinGroupCriteria implements CriteriaInterface
{
    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
        $model = $model
            ->join("ref_blog_group", "ref_blog_group.blog_id", "=", "blogs.id")
            ->join("blog_groups", "blog_groups.id", "=", "ref_blog_group.blog_group_id")
        ;

        return $model;
    }
}
