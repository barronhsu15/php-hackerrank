<?php

/**
 * @param array<int, int> $arr
 * @return int
 */
function lilysHomework($arr)
{
    // Write your code here
    $minArr = $arr;
    $minTimes = 0;
    $maxArr = $arr;
    $maxTimes = 0;

    foreach (array_keys($arr) as $key) {
        $min = null;
        $minFrom = null;
        $max = null;
        $maxFrom = null;

        for ($i = $key; $i < count($minArr); $i++) {
            if ($minArr[$i] < $min || $min === null) {
                $min = $minArr[$i];
                $minFrom = $i;
            }
        }

        if ($minFrom !== $key) {
            $minArr[$minFrom] += $minArr[$key];
            $minArr[$key] = $minArr[$minFrom] - $minArr[$key];
            $minArr[$minFrom] -= $minArr[$key];
            $minTimes++;
        }

        for ($i = $key; $i < count($maxArr); $i++) {
            if ($maxArr[$i] > $max || $max === null) {
                $max = $maxArr[$i];
                $maxFrom = $i;
            }
        }

        if ($maxFrom !== $key) {
            $maxArr[$maxFrom] += $maxArr[$key];
            $maxArr[$key] = $maxArr[$maxFrom] - $maxArr[$key];
            $maxArr[$maxFrom] -= $maxArr[$key];
            $maxTimes++;
        }
    }

    return min($minTimes, $maxTimes);
}