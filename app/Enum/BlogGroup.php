<?php


namespace App\Enum;


final class BlogGroup
{

    const TYPES_RULE = 'category,kind';
    const TYPES = [
        'category' => ['key' => 'category', 'name' => 'Category'],
        'kind' => ['key' => 'kind', 'name' => 'Kind'],
    ];

//    public static function getType($key): ?array
//    {
//        return self::TYPES[$key] ?? null;
//    }
//    public static function getTypes(): array
//    {
//        return array_values(self::TYPES);
//    }
//
//    public static function getTypesWithKey(): array
//    {
//        return (self::TYPES);
//    }
}
