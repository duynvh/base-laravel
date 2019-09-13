<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 23:05
 */

namespace Module\Acl\Repositories\Eloquent;

use Module\Acl\Models\User;
use Module\Acl\Repositories\Interfaces\UserInterface;
use Module\Base\Repositories\Eloquent\RepositoriesAbstract;

class UserRepository extends RepositoriesAbstract implements UserInterface
{

    public function getModel()
    {
        return User::class;
    }

    public function getDataSiteMap()
    {
        $data = $this->model
            ->where('username', '!=', null)
            ->select(['username', 'updated_at'])
            ->orderBy('created_at', 'desc')
            ->get();

        return $data;
    }

    public function getUniqueUsernameFromEmail($email)
    {
//        $emailPrefix = substr($email, 0, strpos($email, '@'));
//        $username = $emailPrefix;
//        $offset = 1;
//        while ($this->getFirstBy(['username' => $username])) {
//            $username = $emailPrefix . $offset;
//            $offset++;
//        }
//
//        return $username;
    }
}