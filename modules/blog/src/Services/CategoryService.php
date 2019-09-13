<?php

namespace Module\Blog\Services;

use Module\Blog\Repositories\Interfaces\CategoryInterface;

class CategoryService
{
    protected $categoryRepository;

    public function __construct(CategoryInterface $category)
    {
        $this->categoryRepository = $category;
    }


}