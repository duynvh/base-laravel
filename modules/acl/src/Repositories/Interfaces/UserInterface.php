<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 23:00
 */

namespace Module\Acl\Repositories\Interfaces;

use Module\Base\Repositories\Interfaces\RepositoryInterface;

interface UserInterface extends RepositoryInterface
{
    public function getDataSiteMap();

    public function getUniqueUsernameFromEmail($email);
}