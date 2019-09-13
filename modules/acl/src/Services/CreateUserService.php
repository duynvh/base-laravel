<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 23:12
 */

namespace Module\Acl\Services;

use Module\Acl\AclManager;
use Module\Acl\Repositories\Interfaces\RoleInterface;
use Module\Acl\Repositories\Interfaces\UserInterface;
use Hash;
use Illuminate\Http\Request;

class CreateUserService
{
    protected $userRepository;
    protected $roleRepository;

    public function __construct(
        UserInterface $userRepository,
        RoleInterface $roleRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function execute(Request $request) {
        $user = $this->userRepository->createOrUpdate($request->input());

        if ($request->has('username') && $request->has('password')) {
            $this->userRepository->update(['id' => $user->id], [
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
            ]);

            if (AclManager::activate($user) && $request->input('role_id')) {
                $role = $this->roleRepository->getFirstBy([
                    'id' => $request->input('role_id'),
                ]);

                if (!empty($role)) {
                    $role->users()->attach($user->id);
                }
            }
        }

        return $user;
    }
}