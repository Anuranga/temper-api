<?php declare(strict_types = 1);

namespace Manager\Domain\Boundary\Repositories;
use Manager\Domain\Entities\FlowGraphCreator;

interface FlowRepositoryInterface
{
    public function showFlowGraph() : array;
}
