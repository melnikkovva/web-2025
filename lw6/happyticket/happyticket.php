
<?php
    $firstNumberOfTicket = $_POST["firstNumberOfTicket"];
    $secondNumberOfTicket = $_POST["secondNumberOfTicket"];
    echo 'Входные данные ' . "<br>" . $firstNumberOfTicket . "<br>" . $secondNumberOfTicket . "<br>" ;
    echo 'Выходные данные ' . "<br>";
    for ($n = $firstNumberOfTicket; $n <= $secondNumberOfTicket; $n++) {
        $s = str_split((string)$n);
        if (($s[0] + $s[1] + $s[2]) == ($s[3] + $s[4] +  $s[5])){
            echo $n . "<br>";
        }    
    }
?>   
    