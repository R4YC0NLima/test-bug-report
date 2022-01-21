<?php


namespace App\Models\Enum;


use Exception;


class EnumClassificacaoDeBug
{
    const VISUAIS       = 1;
    const SONOROS       = 2;
    const FISICOS       = 3;
    const GLITCHS       = 4;
    const FINANCEIRO    = 5;

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
            static::VISUAIS     => ['id' => self::VISUAIS,      'name' => 'Visuais'],
            static::SONOROS     => ['id' => self::SONOROS,      'name' => 'Sonoros'],
            static::FISICOS     => ['id' => self::FISICOS,      'name' => 'Fisicos'],
            static::GLITCHS     => ['id' => self::GLITCHS,      'name' => 'Glitchs'],
            static::FINANCEIRO  => ['id' => self::FINANCEIRO,   'name' => 'Financeiros'],
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
