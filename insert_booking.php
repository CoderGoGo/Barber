<?php 
    if (!empty($_POST["name"]) && !empty($_POST["datetime"])) {
        $user = 'root';
        $password = '';
        $db_name = 'barbershop_db';

        $db = mysqli_connect('localhost', $user, $password, $db_name) or die('Не получилось подключится');

        $arr = explode('T', $_POST["datetime"]);
        $date = $arr[0] . ' ' . $arr[1];

        $booking_id = random_int(1002, 10000);
        $name = $_POST["name"];

        echo 'Номер заказа: ' . $booking_id . '<br /> ';
        echo 'Имя: ' . $name . '<br /> ' ;
        echo 'Дата: ' . $date . '<br /> ' ;

        $sql = "insert into booking (id, name, booking_date) values (" . $booking_id . ", '". $name ."', '". $date ."')";
        $query = mysqli_query($db, $sql);
        mysqli_close($db);

        echo "Запись успешна";
    } else {  
        echo "No, mail is not set";
    }
?>