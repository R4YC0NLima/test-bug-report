<?php


namespace App\Models\Enum;


use Exception;


class EnumStatusBug
{
    const OPEN          = 1;
    const INCORRECTION  = 2;
    const ADJUSTED      = 3;

    public static function getName($key): ?string
    {
        try {
            return static::map()[$key]['name'];
        } catch (Exception $e) {
            return null;
        }
    }

    public static function getArray($key): ?array
    {
        try {
            return static::map()[$key];
        } catch (Exception $e) {
            return null;
        }
    }

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function map(): array
    {
        return [
            static::OPEN            => ['id' => self::OPEN,         'name' => 'Em aberto'],
            static::INCORRECTION    => ['id' => self::INCORRECTION, 'name' => 'Em correção'],
            static::ADJUSTED        => ['id' => self::ADJUSTED,     'name' => 'Corrígido'],
        ];
    }

    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function all(): array
    {
        $data = [];

        foreach (self::map() as $item) {
            $data[] = $item;
        }

        return $data;
    }
}
