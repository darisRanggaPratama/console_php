<?php
namespace Depresiasi;

interface IDepresiasi
{
    public function depresiasi(): float;
}

abstract class DepresiasiAktiva implements IDepresiasi
{
    abstract public function depresiasi(): float;
}
