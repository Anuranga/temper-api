<?php declare(strict_types = 1);

namespace Manager\Data\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;

class MobileUser extends Model
{

    public $timestamps = false;

    const TABLE = 'mobile_user';

    protected $table = self::TABLE;
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
    ];

}