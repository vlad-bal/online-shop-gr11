<?php
$conn = pg_connect("host=postgres_db dbname=mydb user=user password=pwd");
if ($conn) {
    echo "Connected to PostgreSQL successfully";
} else {
    echo "Connection failed.";
}
?>