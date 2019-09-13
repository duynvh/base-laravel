<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 23:20
 */

namespace Module\Acl\Repositories\Eloquent;

use Illuminate\Support\Str;
use Module\Acl\Models\Activation;
use Module\Acl\Models\User;
use Module\Acl\Repositories\Interfaces\ActivationInterface;
use Module\Base\Repositories\Eloquent\RepositoriesAbstract;

class ActivationRepository extends RepositoriesAbstract implements ActivationInterface
{
    protected $expires = 259200;

    public function createUser(User $user)
    {
        $activation = $this->model;
        $code = $this->generateActivationCode();
        $activation->fill(compact('code'));
        $activation->user_id = $user->getKey();
        $activation->save();
        return $activation;
    }

    /**
     * Checks if a valid activation for the given user exists.
     *
     * @param  \Module\ACL\Models\User $user
     * @param  string $code
     * @return \Module\ACL\Models\Activation|bool
     */
    public function exists(User $user, $code = null)
    {
        $expires = $this->expires();
        $activation = $this
            ->model
            ->where('user_id', $user->getKey())
            ->where('code', $code)
            ->where('completed', false)
            ->where('created_at', '>', $expires)
            ->first();

        if ($activation === null) {
            return false;
        }

        $activation->fill([
            'completed'    => true,
            'completed_at' => now(config('app.timezone')),
        ]);

        $activation->save();
        return true;
    }

    /**
     * Checks if a valid activation for the given user exists.
     *
     * @param  \Module\ACL\Models\User $user
     * @param  string $code
     * @return bool
     */
    public function complete(User $user, $code)
    {
        $activation = $this
            ->model
            ->where('user_id', $user->getKey())
            ->where('completed', true)
            ->first();
        return $activation ?: false;
    }

    /**
     * Remove an existing activation (deactivate).
     *
     * @param  \Module\ACL\Models\User $user
     * @return bool|null
     */
    public function remove(User $user)
    {
        $activation = $this->completed($user);
        if ($activation === false) {
            return false;
        }

        return $activation->delete();
    }

    /**
     * Remove expired activation codes.
     *
     * @return int
     */
    public function removeExpired()
    {
        $expires = $this->expires();
        return $this
            ->model
            ->where('completed', false)
            ->where('created_at', '<', $expires)
            ->delete();
    }

    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Activation::class;
    }

    /**
     * Returns the expiration date.
     *
     * @return \Carbon\Carbon
     */
    protected function expires()
    {
        return now(config('app.timezone'))->subSeconds($this->expires);
    }

    /**
     * Return a random string for an activation code.
     *
     * @return string
     */
    protected function generateActivationCode()
    {
        return Str::random(32);
    }
}