<?php

namespace Tugas\Dac\Service;

class MergeSort
{
    public function mergeSort($array): array
    {
        if (count($array) === 1) {
            return $array;
        }

        $middleOfArray = count($array) / 2;
        $arrayRight = array_slice($array, 0, $middleOfArray);
        $arrayLeft = array_slice($array, $middleOfArray);

        $right = $this->mergeSort($arrayRight);
        $left = $this->mergeSort($arrayLeft);

        return $this->merge($right, $left);
    }

    public function merge($right, $left): array
    {
        $result = array();

        while (count($right) > 0 && count($left) > 0) {
            if ($right[0] < $left[0]) {
                $result[] = $left[0];
                $left = array_slice($left, 1);
            } else {
                $result[] = $right[0];
                $right = array_slice($right, 1);
            }
        }

        while (count($left) > 0) {
            $result[] = $left[0];
            $left = array_slice($left, 1);
        }

        while (count($right) > 0) {
            $result[] = $right[0];
            $right = array_slice($right, 1);
        }

        return $result;
    }
}











