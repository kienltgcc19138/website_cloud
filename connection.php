

<?php
    $conn = pg_connect("postgres://shmtnrxqfepiky:dc2e01ef15220f14cbc81b522d51fceb224507f338f39cec83a996485e216a25@ec2-3-229-166-245.compute-1.amazonaws.com:5432/daqnh7pf14invs");
    //$conn = pg_connect("postgresql://postgres:322001@localhost:5432/postgres");
    if(!$conn){
        die("Can not connect database");
    } 
?>