<?php

namespace App\Http\Services;

class ParseJsonFileService
{
    private string $fileName = 'firstvet.json';
    private string $path = 'files/';

    public function __construct(private ValidateFileService $validateFileService,
                                private SortResultService $sortResultService)
    {
        //
    }

    /**
     * @return array|false
     */
    public function __invoke(): bool|array
    {
        $fullPath = storage_path($this->path . $this->fileName);
        if (file_exists($fullPath)) {
            $data = json_decode(file_get_contents($fullPath), true);
        }
        else {
            return false;
        }

        $result = [];
        $fifteenMinutes  = 15 * 60;

        foreach($data as $value){
            if (!($this->validateFileService)($value)) {
                return false;
            }

            $zeroValue = strtotime('00:00:00');

            $startTime    = strtotime ($value['startTime']);
            $endTime      = strtotime ($value['endTime']);
            $startBreak   = strtotime ($value['startBreak']);
            $endBreak     = strtotime ($value['endBreak']);
            $startBreak2  = strtotime ($value['startBreak2']);
            $endBreak2    = strtotime ($value['endBreak2']);
            $startBreak3  = strtotime ($value['startBreak3']);
            $endBreak3    = strtotime ($value['endBreak3']);
            $startBreak4  = strtotime ($value['startBreak4']);
            $endBreak4    = strtotime ($value['endBreak4']);

            while ($startTime < $endTime) {
                $start = date("H:i", $startTime);
                $finishTime = $startTime + $fifteenMinutes;
                $finish = date("H:i", $finishTime);

                if ($startBreak != $zeroValue) if (($startTime >= $startBreak) && ($startTime < $endBreak)) {
                    $startTime += $fifteenMinutes;
                    continue;
                }
                if ($startBreak2 != $zeroValue) if (($startTime >= $startBreak2) && ($startTime < $endBreak2)) {
                    $startTime += $fifteenMinutes;
                    continue;
                }
                if ($startBreak3 != $zeroValue) if (($startTime >= $startBreak3) && ($startTime < $endBreak3)) {
                    $startTime += $fifteenMinutes;
                    continue;
                }
                if ($startBreak4 != $zeroValue) if (($startTime >= $startBreak4) && ($startTime < $endBreak4)) {
                    $startTime += $fifteenMinutes;
                    continue;
                }

                if($finishTime < $endTime) array_push($result,  $value['startDate'] . ' ' . $start . ' - ' . $finish . ' ' . $value['employeeName']);
                $startTime += $fifteenMinutes;
            }
        }

        //Sort result and return
        return ($this->sortResultService)($result);
    }
}
