<?php declare(strict_types = 1);

namespace Manager\Adapters\Hash\Bcrypt;

use Manager\Domain\Exceptions\AdapterException;

class BcryptAdapterException extends AdapterException
{
    const ERR_PREFIX = parent::ERR_PREFIX_HASH;

    public static function costNotInt($previous = null)
    {
        throw new BcryptAdapterException('Cost should be an integer', self::ERR_PREFIX + 1, $previous);
    }
}