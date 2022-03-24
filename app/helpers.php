<?php declare(strict_types=1);

 if (! function_exists('getFormatedDatetimeFromMinutes')) {
     /**
      * @return string
      */
     function getFormatedDatetimeFromMinutes($minute): string
     {
         $h = floor($minute / 60);
         $m = $minute % 60;
         return $h . "h" . $m . "m";
     }
 }
