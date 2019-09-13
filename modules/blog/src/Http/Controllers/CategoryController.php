<?php

namespace Module\Blog\Http\Controllers;

use Module\Base\Http\Controllers\BaseController;
use Module\Blog\Services\CategoryService;

class CategoryController extends BaseController
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getList()
    {

    }

    public function getCreate()
    {
        return view('module-blog::admin.categories.create');
    }
}