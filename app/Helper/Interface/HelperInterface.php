<?php

namespace App\Helper\Interface;

interface HelperInterface
{
    public static function encryptFile($file);
    public static function decryptFile($file);
}
