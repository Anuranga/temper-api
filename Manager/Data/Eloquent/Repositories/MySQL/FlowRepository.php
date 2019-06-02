<?php declare(strict_types = 1);

namespace Manager\Data\Eloquent\Repositories\MySQL;

use Illuminate\Support\Facades\DB;
use Manager\Data\Eloquent\Models\Flow;
use Manager\Domain\Boundary\Repositories\FlowRepositoryInterface;
use Manager\Domain\Entities\FlowGraphCreator;
use Mockery\Exception;

class FlowRepository implements FlowRepositoryInterface
{
    /**
     * @var Flow
     */
    private $flow;

    /**
     * PeopleRepository constructor.
     *
     * @param Flow $flow
     */
    public function __construct(Flow $flow)
    {
        $this->flow = $flow;
    }

    public function showFlowGraph(): array
    {
        $result =  DB::select("SELECT
            STR_TO_DATE(
                CONCAT(tb.cohort, ' Monday'),
                '%X-%V %W'
            ) AS date,
            size,
            w1,
            w2,
            w3,
            w4
            FROM
            (
                SELECT
                    u.cohort,
                    IFNULL(SUM(u. OFFSET = 1), 0) w1,
                    IFNULL(SUM(u. OFFSET = 2), 0) w2,
                    IFNULL(SUM(u. OFFSET = 3), 0) w3,
                    IFNULL(SUM(u. OFFSET = 4), 0) w4
                FROM
                    (
                        SELECT
                            DISTINCT user_id,
                            DATE_FORMAT(created_at, \"%Y-%u\") AS cohort,
                            FLOOR(
                            MOD(WEEK(created_at) , 7)
                        ) AS OFFSET
                        FROM
                            flow
                    ) AS u
                
                GROUP BY
                    u.cohort
            ) AS tb
            LEFT JOIN (
            SELECT
                DATE_FORMAT(created_at, \"%Y-%u\") dt,
                COUNT(*) size
            FROM
                flow
            GROUP BY
                dt
            ) size ON tb.cohort = size.dt");

        return $this->mapToFlowCreator($result);
    }

    private function mapToFlowCreator($request) : array
    {
        $dataList = [
            'data' => []
        ];

        $creator = new FlowGraphCreator();

        foreach($request as $data){
            $creator = new FlowGraphCreator();
            $creator->date = $data->date;
            $creator->size = $data->size;
            $creator->w1 = $data->w1;
            $creator->w2 = $data->w2;
            $creator->w3 = $data->w3;
            $creator->w4 = $data->w4;

            $dataList['data'][] = $creator;
        }

        return $dataList;
    }


}
