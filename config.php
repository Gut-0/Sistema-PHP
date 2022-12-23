<?php

$dbHost = 'localhost';
$dbport = 5432;
$dbUsername = 'postgres';
$dbPassword = 'postgres';
$dbName = 'formulario-gustavo';

$myPDO = new PDO("pgsql:host=$dbHost; dbname=$dbName", "postgres", "postgres");
