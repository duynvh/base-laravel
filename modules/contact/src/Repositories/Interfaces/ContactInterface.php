<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/6/19
 * Time: 23:00
 */

namespace Module\Contact\Repositories\Interfaces;

use Module\Base\Repositories\Interfaces\RepositoryInterface;

interface ContactInterface extends RepositoryInterface
{
    /**
     * @param array $select
     * @return mixed
     * @author Duy Nguyen
     */
    public function getUnread($select = ['*']);

    /**
     * @return int
     * @author Duy Nguyen
     */
    public function countUnread();
}