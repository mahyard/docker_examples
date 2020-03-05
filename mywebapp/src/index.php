<!DOCTYPE html>
<html>
<title>My Web Application</title>
<link rel="stylesheet" type="text/css" href="css/style.css"></link>

<body>
<?php
/*
 * Initialization
 */
require 'config.php';

$mysqli = new mysqli($host, $user, $pass, $name);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error . " Unable to connect to $name"
            . " on $host with username: $user and password: $pass");
}

$sql = "CREATE TABLE IF NOT EXISTS mwa_hits (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    server VARCHAR(12) NOT NULL,
    remote_addr VARCHAR(39) NOT NULL,
    request_time DATETIME NOT NULL
)";

if($mysqli->query($sql) !== TRUE) {
    echo "Error creating table: " . $mysqli->error;
}

$hostname = gethostname();
$sql = "INSERT INTO `mwa_hits` (server, remote_addr, request_time) VALUES (
    '{$hostname}', '{$_SERVER['REMOTE_ADDR']}', NOW()
)";

if($mysqli->query($sql) !== TRUE) {
    echo "Error while inserting data: " . $mysqli->error;
}

function render_table($result){
    echo "<table>";
    echo "<tr class='header'>";
    echo "<td>SERVER</td>";
    echo "<td>REMOTE ADDR</td>";
    echo "<td>REQUEST TIME</td>";
    echo "</tr>";
    while($obj = $result->fetch_object()){
        echo "<tr>";
        echo "<td>{$obj->server}</td>";
        echo "<td>{$obj->remote_addr}</td>";
        echo "<td>{$obj->request_time}</td>";
        echo "</tr>";
    }
    echo "</table>";

}
$sql = "SELECT * FROM `mwa_hits` ORDER BY request_time DESC LIMIT 100";

if($result = $mysqli->query($sql)) {

    render_table($result);
    echo "Returned rows are: " . $result -> num_rows;

    // Free result set
    $result -> free_result();
} else {
    echo "Error while querying data: " . $mysqli->error;
}

$mysqli->close();
