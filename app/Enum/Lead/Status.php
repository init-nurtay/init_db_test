<?php

namespace App\Enum\Lead;

use BenSampo\Enum\Enum;

class Status extends Enum
{
    const NEW = 'new';
    const CLOSED = 'closed';
    const COMPLETED = 'completed';
    const IN_PROGRESS = 'in_progress';
    const FROZEN = 'frozen';

    public static function getRussianLabels(): array
    {
        return [
            self::NEW => 'Новый',
            self::CLOSED => 'Отказ',
            self::COMPLETED => 'Успешно',
            self::IN_PROGRESS => 'В Процессе',
            self::FROZEN => 'Замороженный',
        ];
    }
//    public static function getStatusColorInRussianLabel(string $status)
//    {
//        switch ($status){
//            case 'Новый':
//                return 'warning';
//            case 'Отказ':
//                return 'primary';
//            case 'Успешно':
//                return 'success';
//            case 'Замороженный':
//            case 'В Процессе':
//                return 'info';
//        }
////        return match ($status) {
////            'Новый' => 'warning',
////            'Отказ' => 'primary',
////            'Успешно' => 'success',
////            'Процессе' => 'info',
////            'Замороженный' => 'info',
////        };
//    }
}