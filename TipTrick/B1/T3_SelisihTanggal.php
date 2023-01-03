<?php
$tgl1 = "2023-02-01";
$tgl2 = "2023-02-27";
$tgl3 = "2008-05-01";
$tgl4 = "2023-12-13";

// Pecah tgl untuk dapat tanggal, bulan dan tahun dari $tgl1
$pecah1 = explode("-", $tgl1);
$date1 = $pecah1[2];
$month1 = $pecah1[1];
$year1 = $pecah1[0];

$pecah2 = explode("-", $tgl2);
$date2 = $pecah2[2];
$month2 = $pecah2[1];
$year2 = $pecah2[0];

$pecah3 = explode("-", $tgl3);
$date3 = $pecah3[2];
$month3 = $pecah3[1];
$year3 = $pecah3[0];

$pecah4 = explode("-", $tgl4);
$date4 = $pecah4[2];
$month4 = $pecah4[1];
$year4 = $pecah4[0];

// Hitung JDN (Julian Day Number)
$jd1 = gregoriantojd($month1, $date1, $year1);
$jd2 = gregoriantojd($month2, $date2, $year2);
$jd3 = gregoriantojd($month3, $date3, $year3);
$jd4 = gregoriantojd($month4, $date4, $year4);

// Selisih 2 tanggal
$selisih1 = abs($jd1 - $jd2);
$selisih2 = abs($jd1 - $jd3);
$selisih3 = abs($jd1 - $jd4);

echo "\r\nSelisih $tgl1 s/d $tgl2: $selisih1 hari";
echo "\r\nSelisih $tgl1 s/d $tgl3: $selisih2 hari";
echo "\r\nSelisih $tgl1 s/d $tgl4: $selisih3 hari";
echo "\r\n";
