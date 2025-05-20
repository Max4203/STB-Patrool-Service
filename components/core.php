<?php
session_start();

$mysqli = new mysqli('localhost', 'root', '', 'diplom_ohrana');

$mysqli->set_charset('utf8mb4');
