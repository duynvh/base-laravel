<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 9/10/19
 * Time: 22:55
 */

namespace Module\Acl\Models;

use Illuminate\Database\Eloquent\Model;

class Activation extends Model
{
    protected $table = 'activations';

    protected $fillable = [
        'code',
        'completed',
        'completed_at',
    ];

    public function getCompletedAttribute($completed)
    {
        return (bool)$completed;
    }

    public function setCompletedAttribute($completed)
    {
        $this->attributes['completed'] = (bool)$completed;
    }

    public function getCode()
    {
        return $this->attributes['code'];
    }
}