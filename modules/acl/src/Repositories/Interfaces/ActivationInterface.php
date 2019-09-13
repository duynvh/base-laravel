<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 23:17
 */

namespace Module\Acl\Repositories\Interfaces;

use Module\Acl\Models\User;

interface ActivationInterface
{
    public function createUser(User $user);

    /**
     * Checks if a valid activation for the given user exists.
     *
     * @param  \Module\ACL\Models\User $user
     * @param  string $code
     * @return \Module\ACL\Models\Activation|bool
     */
    public function exists(User $user, $code = null);

    /**
     * Checks if a valid activation for the given user exists.
     *
     * @param  \Module\ACL\Models\User $user
     * @param  string $code
     * @return bool
     */
    public function complete(User $user, $code);

    /**
     * Remove an existing activation (deactivate).
     *
     * @param  \Module\ACL\Models\User $user
     * @return bool|null
     */
    public function remove(User $user);

    /**
     * Remove expired activation codes.
     *
     * @return int
     */
    public function removeExpired();
}