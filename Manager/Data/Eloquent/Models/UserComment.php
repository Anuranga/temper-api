<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 8/7/2018
 * Time: 9:22 PM
 */

namespace Manager\Data\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class UserComment extends Model
{
    const TABLE = 'mobile_user_comments';

    protected $table = self::TABLE;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
    ];
}