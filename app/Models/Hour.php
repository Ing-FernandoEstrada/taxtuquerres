<?php

namespace App\Models;

class Hour
{
    public static array $hours = [
        '04:00:00',
        '05:00:00',
        '06:00:00',
        '07:00:00',
        '08:00:00',
        '09:00:00',
        '10:00:00',
        '11:00:00',
        '12:00:00',
        '13:00:00',
        '14:00:00',
        '15:00:00',
        '16:00:00',
        '17:00:00',
        '18:00:00',
        '19:00:00',
        '20:00:00',
    ];

    public static array $timeUnits = [
        ['id' => 1, 'unit' => 'Minute(s)'],
        ['id' => 2, 'unit' => 'Hour(s)'],
    ];

    public static function optionsHTML():string {
        $hours = self::$hours;
        $html = '<option value="">'.__('Hour').'</option>';
        foreach ($hours as $hour) {
            $html .= '<option value="'.$hour.'">'.$hour.'</option>';
        } return $html;
    }
}
