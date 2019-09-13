<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/6/19
 * Time: 23:01
 */

namespace Module\Contact\Repositories\Eloquent;


use Module\Base\Repositories\Eloquent\RepositoriesAbstract;
use Module\Contact\Models\Contact;
use Module\Contact\Repositories\Interfaces\ContactInterface;

class ContactRepository extends RepositoriesAbstract implements ContactInterface
{
    public const READ = 'read';
    public const UNREAD = 'unread';

    public function getModel() {
        return Contact::class;
    }

    /**
     * {@inheritdoc}
     */
    public function getUnread($select = ['*'])
    {
        $data = $this->model->where('status', self::UNREAD)->select($select)->get();
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function countUnread()
    {
        $data = $this->model->where('status', self::UNREAD)->count();
        return $data;
    }
}