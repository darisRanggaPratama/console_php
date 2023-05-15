<?php
function telat(int|float $menitTelat, int $gapok):int
{
    $telat = $menitTelat;

# INDEX TELAT
   if ($telat < 30) {
       $jam = 0;
   }elseif ($telat < 121) {
       $jam = 3;
   }elseif ($telat < 241) {
       $jam = 6;
   }else {
      $jam = 8;
   }


$index = $jam;
echo "\ntelat: $index gapok: $gapok potong: ";
return round($index * (($gapok/2) / 173));
}




?>
