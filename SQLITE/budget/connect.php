<?php
// Database name
$database_name = "dummy.db3";

// Database Connection
$db = new SQLite3($database_name);

$query = "CREATE TABLE IF NOT EXISTS `sample` (
	`ID` INTEGER NOT NULL UNIQUE,
	`KODE`	TEXT NOT NULL UNIQUE,
	`BLN`	TEXT NOT NULL,
	`GAJI`	REAL NOT NULL,
	`LEMBUR`	REAL NOT NULL,
	`TJ_LAIN`	REAL NOT NULL,
	`BRUTO`	REAL NOT NULL,
	`POT`	REAL NOT NULL,
	`TRF`	REAL NOT NULL,
	`HMN`	INTEGER NOT NULL,
	PRIMARY KEY(`ID` AUTOINCREMENT)
)";
$db->exec($query);

