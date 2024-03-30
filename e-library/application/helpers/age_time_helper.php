<?php

class age_time_helper
{
    function findage($date)
    {
        $dob = strtotime($date);
        $current_time = time();
        $age_years = date('Y',$current_time) - date('Y',$dob);
        $age_months = date('m',$current_time) - date('m',$dob);
        $age_days = date('d',$current_time) - date('d',$dob);

        if ($age_days<0) {
            $days_in_month = date('t',$current_time);
            $age_months--;
            $age_days= $days_in_month+$age_days;
        }

        if ($age_months<0) {
            $age_years--;
            $age_months = 12+$age_months;
        }

        return"{$age_years} years, {$age_months} months and {$age_days} days old.";  
    }
    function humanTiming ($human_time)
    {
        
        $providedtime = strtotime($human_time);
        $time = time() - $providedtime; // to get the time since that moment
        $time = ($time<1)? 1 : $time;
        $tokens = array (
        31536000 => 'year',
        2592000 => 'month',
        604800 => 'week',
        86400 => 'day',
        3600 => 'hour',
        60 => 'minute',
        1 => 'second'
    );

    foreach ($tokens as $unit => $text) {
        if ($time < $unit) continue;
        $numberOfUnits = floor($time / $unit);
        return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
    }

}
}