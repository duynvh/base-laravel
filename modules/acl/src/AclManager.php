<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 23:26
 */

namespace Module\Acl;

use Module\Acl\Models\User;
use Module\Acl\Repositories\Interfaces\ActivationInterface;
use Module\Acl\Repositories\Interfaces\RoleInterface;
use Module\Acl\Repositories\Interfaces\UserInterface;
use InvalidArgumentException;

class AclManager
{
    protected $users;
    protected $roles;
    protected $activations;

    public function __construct(
        UserInterface $users,
        RoleInterface $roles,
        ActivationInterface $activations
    )
    {
        $this->users = $users;
        $this->roles = $roles;
        $this->activations = $activations;
    }

    public function activate($user)
    {
        if (!$user instanceof User) {
            throw new InvalidArgumentException('No valid user was provided.');
        }

        $activations = $this->getActivationRepository();
        $activation = $activations->createUser($user);
        return $activations->complete($user, $activation->getCode());
    }

    public function getUserRepository()
    {
        return $this->users;
    }

    public function getRoleRepository()
    {
        return $this->roles;
    }

    public function setRoleRepository(RoleInterface $roles)
    {
        $this->roles = $roles;
    }

    public function getActivationRepository()
    {
        return $this->activations;
    }

    public function setActivationRepository(ActivationInterface $activations)
    {
        $this->activations = $activations;
    }
}
