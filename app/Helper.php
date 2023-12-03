<?php

namespace App\Helpers;

class Helper
{

   public static function ZeroValue($Value)
   {
      if ($Value == '') {
         $Value = 0;
      }
      return $Value;
   }
}
