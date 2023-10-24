<?php

namespace App\Helper;

use App\Helper\Interface\HelperInterface;

class Helper implements HelperInterface
{
    public static function encryptFile($file)
    {
        return \Illuminate\Support\Facades\Crypt::encrypt($file);
    }

    public static function decryptFile($file)
    {
        return \Illuminate\Support\Facades\Crypt::decrypt($file);
    }
}
