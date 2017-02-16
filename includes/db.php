<?php 
    const DB_CON = ['localhost', 'root', '','cms'];
    $con = mysqli_connect(constant('DB_CON')[0],constant('DB_CON')[1],
                          constant('DB_CON')[2],constant('DB_CON')[3]);
    
    if(!$con) {
        echo "we are NOT connected.";
    }
?> 