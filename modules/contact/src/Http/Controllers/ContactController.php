<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/4/19
 * Time: 23:17
 */

namespace Module\Contact\Http\Controllers;

use App\Http\Controllers\Controller;
use Module\Contact\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        Contact::create([
            'name' => trans("module-contact::contact.name") . time(),
            'email' => 'admin@gmail.com',
            'phone' => '123123',
            'address' => '123123',
            'subject' => '123123',
            'content' => '123123',
        ]);
        return view('module-contact::index');
    }
}