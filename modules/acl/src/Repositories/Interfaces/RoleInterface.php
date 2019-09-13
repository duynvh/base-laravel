<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/6/19
 * Time: 23:00
 */

namespace Module\Acl\Repositories\Interfaces;

use Module\Base\Repositories\Interfaces\RepositoryInterface;

interface RoleInterface extends RepositoryInterface
{
    /**
     * @param array $select
     * @return mixed
     * @author Duy Nguyen
     */
    public function createSlug($name, $id);
}