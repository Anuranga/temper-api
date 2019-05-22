<?php declare(strict_types = 1);

namespace Manager\Domain\UseCases\FlowViewer;

use Manager\Domain\Entities\FlowGraphCreator;
use Manager\Domain\Boundary\Repositories\FlowRepositoryInterface as FlowRepository;
use Illuminate\Support\Collection;
use Manager\Domain\UseCases\FlowViewer\GraphCreateException;

class GraphCreate
{
    /**
     * @var FlowRepository
     */
    private $flowRepository;

    /**
     * GraphCreate constructor.
     * @param FlowRepository $flowRepository
     */
    public function __construct(FlowRepository $flowRepository)
    {
        $this->flowRepository = $flowRepository;
    }


    public function showGraph()
    {
        $result = $this->flowRepository->showFlowGraph();

        if(empty($result)){
            GraphCreateException::noRecords();
        }

        return $result;
    }

}
