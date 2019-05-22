<?php declare(strict_types = 1);

namespace Manager\Adapters\DateTime\Generic;

use Manager\Domain\Boundary\Adapters\DateTimeAdapter;
use DateTime;
use DateTimeZone;

class GenericDateTimeAdapter implements DateTimeAdapter
{
    private $timeZone = null;


    public function __construct(array $config)
    {
        $this->timeZone = $config['time_zone'];
    }


    /**
     * Get a configured DateTime instance.
     *
     * @param string $time
     * @return \DateTime
     */
    public function getInstance(string $time = 'now') : DateTime
    {
        return new DateTime($time, new DateTimeZone($this->timeZone));
    }
}