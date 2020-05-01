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

    function reverseDate($date) {
        $tempDate = explode('-', $date);
        return $tempDate[2]."-".$tempDate[1]."-".$tempDate[0];
    }

    function isDateExpired($date, $time){
        $arr = explode('-', $date);
        $arr2 = explode('-', date("Y-m-d"));
        if($arr[0] >= $arr2[0]){
            if($arr[1] >= $arr2[1]){
                if($arr[2] >= $arr2[2]){
                    return isTimeExpired($time);
                }
            }
        }
        return true;
    }

    function isTimeExpired($time){
        $arr = explode(':', $time);
        $arr2 = explode(':', date("H:i:s"));
        if($arr[0] > $arr2[0]){
            return false;
        }
        return true;
    }
?>