<?php

namespace App;

class Postcard
{
    public static function resolvefacades($name)
    {
        return app()[$name];
    }

    public static function __callStatic($method, $arguments)
    {
        // preferred syntax
        // dd(app()['Postcard']);

        // alternative syntax
        // dd(app()->make('Postcard'));

        // dd($method);

        return (self::resolvefacades('Postcard'))
            ->$method(...$arguments);
    }
}