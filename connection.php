

<?php
    //$conn = pg_connect("postgres://enesxkbnipglfn:ab5ea2e4b66767be64939974975f8a8e408c547b2d474887e57875666e04a13f@ec2-3-220-90-40.compute-1.amazonaws.com:5432/d5kcq00ts60umq");
    $conn = pg_connect("postgresql://postgres:322001@localhost:5432/postgres");
    if(!$conn){
        die("Can not connect database");
    } 
?>