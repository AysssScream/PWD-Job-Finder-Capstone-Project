<?php
namespace App\Helpers;

class FileHelper
{
    protected static $storedFilePath;

    public static function storeFilePath($filePath)
    {
        self::$storedFilePath = $filePath;
    }

    public static function getStoredFilePath()
    {
        return self::$storedFilePath ?? null;
    }
}

