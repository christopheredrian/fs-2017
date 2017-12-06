<?php
/**
 * Created by PhpStorm.
 * User: chris
 * Date: 12/6/17
 * Time: 6:34 PM
 */

namespace App;
use Illuminate\Support\Facades\DB;

class Utilities
{
    /**
     * Specified a table name get all enum values for this table
     * @param $table
     * @param $column
     * @return array
     */
    public static function getEnumValues($table, $column)
    {
        $type = DB::select(DB::raw("SHOW COLUMNS FROM $table WHERE Field = '{$column}'"))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enum = array();
        foreach (explode(',', $matches[1]) as $value) {
            $v = trim($value, "'");
            $enum = array_add($enum, $v, $v);
        }
        return $enum;
    }

}