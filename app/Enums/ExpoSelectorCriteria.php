<?php

namespace App\Enums;

enum ExpoSelectorCriteria:string {
    case Current = 'current';
    case Last = 'last';
    case Next = 'next';

    static public function values() : array {
        $values = [];
        foreach (static::cases() as $case) {
            array_push($values, $case->value);
        }
        return $values;
    }
    static public function names() : array {
        $names = [];
        foreach (static::cases() as $case) {
            array_push($names, $case->name);
        }
        return $names;
    }
}