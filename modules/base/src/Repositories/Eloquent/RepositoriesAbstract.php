<?php

namespace Module\Base\Repositories\Eloquent;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Arr;
use Module\Base\Repositories\Interfaces\RepositoryInterface;

abstract class RepositoriesAbstract implements RepositoryInterface
{
    /**
     * @var Eloquent | Model
     */
    protected $model;

    /**
     * @var Eloquent | Model
     */
    protected $originalModel;

    /**
     * @var string
     */
    protected $screen = '';

    /**
     * RepositoriesAbstract constructor.
     * @param Model|Eloquent $model
     * @author Duy Nguyen
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->originalModel = $model;
    }

    /**
     * {@inheritdoc}
     */
    public function getScreen(): string
    {
        return $this->screen;
    }

    /**
     * {@inheritdoc}
     */
    public function setModel($model): self
    {
        $this->model = $model;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * {@inheritdoc}
     */
    public function getTable()
    {
        return $this->model->getTable();
    }

    /**
     * {@inheritdoc}
     */
    public function getFirstBy(array $condition = [], array $select = ['*'], array $with = [])
    {
        $this->applyCriteria();
        $this->make($with);
        if (!empty($select)) {
            $data = $this->model->where($condition)->select($select);
        } else {
            $data = $this->model->where($condition);
        }
        return $this->applyBeforeExecuteQuery($data, $this->screen, true)->first();
    }
}