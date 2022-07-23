<?php

namespace App\Models;

class Novelty
{
    public static array $novelties = [
        'Viaje finalizado',
        'Trasbordo en la vía',
        'Percance en la vía',
    ];

    public static function optionsHTML(): string {
        $html = '<option value="">'.__('Select an option').'</option>';
        $i = 0;
        foreach (self::$novelties as $novelty) {
            $html .= '<option value="'.$i.'">'.$novelty.'</option>';
        }
        return $html;
    }
}
