<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'key',
        'label',
        'value',
    ];
    public static function get(string $key) : string {
        return Setting::where('key', $key)->first()->value;
    }
    public static function set(string $key, string $value) {
        try {
            $setting = Setting::firstOrCreate()->first();
            $setting->value = $value;
            $setting->save();
        } catch(\Throwable $r){}
    }
}
