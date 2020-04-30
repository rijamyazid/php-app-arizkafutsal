<?php
    function createReadableCurrency($currency){
        switch (strlen($currency)) {
            case 4:
                $arr = str_split($currency, 1);
                return $arr[0].'.'.$arr[1].$arr[2].$arr[3];
                break;
            case 5:
                $arr = str_split($currency, 2);
                return $arr[0].'.'.$arr[1].$arr[2];
                break;
            case 6:
                $arr = str_split($currency, 3);
                return $arr[0].'.'.$arr[1];
                break;
            case 7:
                break;
            default:
                break;
        }
    }
?>