<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/4/19
 * Time: 23:17
 */

namespace Module\Contact\Http\Controllers;

use Module\Base\Http\Controllers\BaseController;
use Module\Base\Http\Responses\BaseHttpResponse;
use Module\Contact\Repositories\Interfaces\ContactInterface;

class ContactController extends BaseController
{
    /**
     * @var ContactInterface
     */
    protected $contactRepository;

    public const READ = 'read';
    public const UNREAD = 'unread';

    public function __construct(ContactInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
//        $data = [
//            'name' => trans("module-contact::contact.name") . time(),
//            'email' => 'admin123@gmail.com',
//            'phone' => '123123',
//            'address' => '123123',
//            'subject' => '123123',
//            'content' => '123123',
//            'status' => self::READ
//        ];
//
//        $this->contactRepository->create($data);
//        return $response->setMessage(trans('module-base::notices.create_success_message'))
//                        ->setCode(201)
//                        ->setData($data)
//                        ->toApiResponse();
        return view("module-contact::admin.create");
//        return view('admin.dashboard');
    }
}