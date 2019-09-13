<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 23:30
 */

namespace Module\Acl\Http\Controllers;

use Module\Acl\Http\Requests\CreateUserRequest;
use Module\Acl\Repositories\Interfaces\RoleInterface;
use Module\Acl\Repositories\Interfaces\UserInterface;
use Module\Acl\Services\CreateUserService;
use Module\Base\Http\Controllers\BaseController;
use Module\Base\Http\Responses\BaseHttpResponse;

class UserController extends BaseController
{
    public function getCreate()
    {
        return view('module-acl::admin.users.create');
    }


    public function postCreate(CreateUserRequest $request, CreateUserService $service, BaseHttpResponse $response)
    {
        $user = $service->execute($request);
        return $response
            ->setPreviousUrl(route('users.list'))
            //->setNextUrl(route('user.profile.view', $user->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }
}