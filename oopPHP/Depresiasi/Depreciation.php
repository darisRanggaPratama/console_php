<?php
namespace Depresiasi;

interface Depresiasi
{
    public function depresiasi(): float;
}

abstract class DepresiasiAktiva implements Depresiasi
{
    abstract public function depresiasi(): float;
}
