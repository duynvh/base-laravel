<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 23:02
 */

namespace Module\Acl\Repositories\Eloquent;

use Illuminate\Support\Str;
use Module\Acl\Models\Role;
use Module\Acl\Repositories\Interfaces\RoleInterface;
use Module\Base\Repositories\Eloquent\RepositoriesAbstract;

class RoleRepository extends RepositoriesAbstract implements RoleInterface
{

    public function getModel()
    {
        return Role::class;
    }

    public function createSlug($name, $id) {
        $slug = Str::slug($name);
        $index = 1;
        $baseSlug = $slug;

        while ($this->model->where('slug', '=', $slug)->where('id', '!=', $id)->count() > 0) {
            $slug = $baseSlug . '-' . $index++;
        }

        if (empty($slug)) {
            $slug = time();
        }

        return $slug;
    }
}