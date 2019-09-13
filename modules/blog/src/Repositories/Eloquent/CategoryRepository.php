<?php

namespace Module\Blog\Repositories\Eloquent;


use Module\Base\Repositories\Eloquent\RepositoriesAbstract;
use Module\Blog\Models\Category;
use Module\Blog\Repositories\Interfaces\CategoryInterface;

class CategoryRepository extends RepositoriesAbstract implements CategoryInterface
{

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Category::class;
    }
}