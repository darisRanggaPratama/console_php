<?php
// Database name
$database_name = "dummy.db3";

// Database Connection
$db = new SQLite3($database_name);

$query = "CREATE TABLE IF NOT EXISTS `sample`  (
	`ID`	INTEGER NOT NULL UNIQUE,
	`KODE`	TEXT NOT NULL UNIQUE,
	`BLN`	TEXT,
	`GAJI`	REAL,
	`LEMBUR`	REAL,
	`TJ_LAIN`	REAL,
	`BRUTO`	REAL,
	`POT`	REAL,
	`TRF`	REAL,
	`HMN`	INTEGER,
	PRIMARY KEY(`ID` AUTOINCREMENT)
)";
$db->exec($query);
?>