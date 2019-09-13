<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 23:34
 */

namespace Module\Acl\Http\Requests;

use Illuminate\Http\Request;

class CreateUserRequest extends Request
{
    public function rules()
    {
        return [
            'first_name'            => 'required|max:60|min:2',
            'last_name'             => 'required|max:60|min:2',
            'email'                 => 'required|max:60|min:6|email|unique:users',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'username'              => 'required|min:4|max:30|unique:users',
        ];
    }
}