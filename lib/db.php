<?php
$host = 'localhost';
$user = '';
$password = 'testsite_vz';
$database = 'testsite_vz';
$con = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($con, 'utf8');

if(mysqli_errno($con)){
    echo 'Failed connect ' . mysqli_errno($con);
}// else {echo 'oke';}
//
//
//$query = "INSERT INTO news_category(name, description, sort_order) VALUES ('name4', 'desc4', 'sort4'),('name5', 'desc5', 'sort5')";
//$query = "DELETE FROM news_category WHERE id=11";
//$sql = "DELETE FROM news WHERE date > DATE_SUB(CURDATE(), INTERVAL 1 HOUR)";
//$sql = "DELETE FROM news ORDER BY date LIMIT 1"; // удалить одну первую с начала строку
//$sql = "DELETE FROM news ORDER BY date DESC LIMIT 1"; // удалить одну строку c конца
//$sql = "UPDATE news SET status='1' WHERE id='7'"; // удалить одну строку c конца
//
//$sql = "SELECT * FROM news";
//$sql = "SELECT MAX(id) AS count FROM news";
//$sql = "SELECT SUM(id) AS sum FROM news";
//$sql = "SELECT *, COUNT(*) AS count FROM news GROUP BY short_content";
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result); // узнать количество полученных строк
//
//
if($count){
    while ($row = mysqli_fetch_array($result)) {
        echo $row['h1'].'-';
        echo $row['count'].'<br>';
        //echo $row['sum'];
    }
}

//$row1 = mysqli_fetch_array($result); // полученные даные преобразовать в массив
//echo '<pre>';
//print_r($row1);
//echo '</pre>';

//echo '<br> mysqli_affected_rows: '. mysqli_affected_rows($con);
//echo '<br> mysqli_num_rows: '.$count; 
//        
//                
//echo '<pre>';
//print_r($result);
//echo '</pre>';
