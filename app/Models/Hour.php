<?php

namespace App\Models;

class Hour
{
    public static array $hours = [
        ['id' => 1, 'hour' => '04:00 am'],
        ['id' => 2, 'hour' => '05:00 am'],
        ['id' => 3, 'hour' => '06:00 am'],
        ['id' => 4, 'hour' => '07:00 am'],
        ['id' => 5, 'hour' => '08:00 am'],
        ['id' => 6, 'hour' => '09:00 am'],
        ['id' => 7, 'hour' => '10:00 am'],
        ['id' => 8, 'hour' => '11:00 am'],
        ['id' => 9, 'hour' => '12:00 pm'],
        ['id' => 10, 'hour' => '01:00 pm'],
        ['id' => 11, 'hour' => '02:00 pm'],
        ['id' => 12, 'hour' => '03:00 pm'],
        ['id' => 13, 'hour' => '04:00 pm'],
        ['id' => 14, 'hour' => '05:00 pm'],
        ['id' => 15, 'hour' => '06:00 pm'],
        ['id' => 16, 'hour' => '07:00 pm'],
        ['id' => 17, 'hour' => '08:00 pm'],
    ];

    public static array $timeUnits = [
        ['id' => 1, 'unit' => 'Minute(s)'],
        ['id' => 2, 'unit' => 'Hour(s)'],
    ];

    public static function optionsHTML():string {
        $hours = self::$hours;
        $html = '<option value="">'.__('Hour').'</option>';
        foreach ($hours as $hour) {
            $html .= '<option value="'.$hour['id'].'">'.$hour['hour'].'</option>';
        } return $html;
    }
}
