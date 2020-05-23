<?php
    function toCurrency($currency){
        switch (strlen($currency)) {
            case 1:
                return "Rp. 0";
                break;
            case 4:
                $arr = str_split($currency, 1);
                return "Rp. ".$arr[0].'.'.$arr[1].$arr[2].$arr[3];
                break;
            case 5:
                $arr = str_split($currency, 2);
                return "Rp. ".$arr[0].'.'.$arr[1].$arr[2];
                break;
            case 6:
                $arr = str_split($currency, 3);
                return "Rp. ".$arr[0].'.'.$arr[1];
                break;
            case 7:
                $arr = str_split($currency, 1);
                return "Rp. ".$arr[0].".".$arr[1].$arr[2].$arr[3].'.'.$arr[4].$arr[5].$arr[6];
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
                if($arr[2] > $arr2[2]){
                    return false;
                } else if($arr[2] == $arr2[2]) {
                    return isTimeExpired($time);
                }
            }
        }
        return true;
    }

    function isTimeExpired($time){
        date_default_timezone_set('Asia/Jakarta');
        $t = time();
        $arr = explode(':', $time);
        $arr2 = explode(':', date("H:i:s", $t));
        if($arr[0] > $arr2[0]){
            return false;
        }
        return true;
    }
?>