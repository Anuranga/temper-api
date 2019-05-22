<?php declare(strict_types = 1);

namespace Manager\Domain\UseCases\FlowViewer;

use Manager\Domain\Exceptions\DomainException;
use Mockery\Exception;

class GraphCreateException extends DomainException
{
    public static function noRecords()
    {
        throw new Exception('Records does not exist');
    }
}
