<!-- Connecting -->
<?php
$databaseName = 'TJOE_labs';
$dsn = 'mysql:host=webdb.uvm.edu;dbname=' . $databaseName;
$username = 'tjoe_writer';
$password = 'zJiai945xLG3';

$pdo = new PDO($dsn, $username, $password);
if($pdo) print '<!-- Connection complete -->';
?>