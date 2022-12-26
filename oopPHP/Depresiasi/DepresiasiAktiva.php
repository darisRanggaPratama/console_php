<?php

namespace DeprAngkaTahun;

require_once 'Depreciation.php';

use Depresiasi\DepresiasiAktiva;

class AngkaTahun extends DepresiasiAktiva
{
    // Enkapsulasi: Private variable
    private string $nama;
    private string $metode;

    public function __construct(string $nama, string $metode)
    {
        // Constructor
        $this->nama = $nama;
        $this->metode = $metode;
    }

    // Enkapsulasi: Getter
    private function getNama(): string
    {
        return $this->nama;
    }

    private function getMetode(): string
    {
        return $this->metode;
    }

    final public function depresiasi(): float
    {
        echo "\r\nCode: PHP\r\nAset: " . $this->getNama();
        echo "\r\nMetode: " . $this->getMetode();
        echo "\r\n";
        $aset = (float)readline("Nilai Aset: ");
        $residu = (float)readline("Nilai Akhir: ");
        $umur = (int)readline("Umur Ekonomis ");
        $this->depAngkaTahun($aset, $residu, $umur);
        echo "\r\n";
        return 0;
    }

    private function depAngkaTahun(float $aset, float $residu, int $umur): void
    {
        if ($aset < 1 || $residu < 0 || $umur < 1) {
            echo "\r\nInput Salah. Nominal: $aset. Residu: $residu. Masa: $umur";
        } else {
            $nominal = abs($aset);
            $saldo = abs($residu);
            $dsrHitung = $nominal - $saldo;
            $waktu = abs($umur);

            $angka = ((1.0 + $waktu) / 2.0) * $waktu;
            $y = 0;
            echo "\r\nThn   Hitung              Depresiasi/Thn   Beban Depresiasi\r\n";

            for ($x = $waktu; $x > 0; $x--) {
                $y++;
                $rate = ($x) / $angka;
                $susut = $rate * $dsrHitung;
                $sisa = $dsrHitung - $susut;

                $txtDsrHitung = number_format($dsrHitung, 2, ",", ".");
                $txtSusut = number_format($susut, 2, ",", ".");
                $txtSisa = number_format($sisa, 2, ",", ".");

                $text = "\r\n$y  $x / $angka x $txtDsrHitung = $txtSusut | $txtSisa";
                echo $text;
            }
        }
    }
}

