<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/empty_style.css">
</head>
<style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 10%;
            flex-direction: column;
        }
        table {
            width: 35rem;
            height: 10rem;
        }
        img {
            width: 10rem;
            height: 10rem;
            /* padding: 2px; */
        }
        tr {
        width: 5rem;
        text-align: center;
        }
        td {
        width: 10rem;
        text-align: center;
        }
        h1 {
            color:rgb(27, 119, 239)
        }

        .contain {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 1.3rem;
            height: 50%;
            width: auto;
            /* border: 2.4px solid rgb(27, 119, 239); */
            /* margin: 9rem;
            border-radius: 1.5rem; */
        }
</style>

<body>

    <?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$connection = mysqli_connect($servername, $username, $password);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}


// mysqli_close($connection);

// echo "Hurray! Connection with Database was Successfull🎉";

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $building = $_POST['building'];
            $floor = $_POST['floor'];
            $time = $_POST['time'];
            $day = $_POST['days'];
        }
        
        if($building == "TT"){
            $building = "TT(TECHNOLOGY TOWER)";
        }
       if ($building == "SJT") {
            $building = "SJT(SILVER JUBLIEE TOWER)";
        }

        $db_selected = mysqli_select_db($connection,"empty room");
        if (!$db_selected)
            {
                die ("Can\'t use test_db : " . mysql_error());
            }
        else{
            // echo "Database selected successfully !";
        }
        // echo "$floor";
        echo "<div class='contain'>";
        echo "<h1>Here are the results...</h1><br>";
        // echo $building;
        // echo $time;
        // echo gettype($floor);
        $query = "SELECT * FROM `empty_details` WHERE `Building` = '$building'  AND `Floor` = '$floor' AND `Time`='$time' AND `Day` =  '$day' AND `Course`LIKE 'Empty Room'";
        $result = mysqli_query($connection,$query) or die("Query Failed : ".mysqli_error());

        echo "<table >";
        echo "<tr>";
        echo "<th> Building </th><th> Floor </th><th> Time </th><th> Day </th><th> Empty Room No.";
        echo "</tr>";


       if ($building == "SJT(SILVER JUBLIEE TOWER)") {
        while ($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td> <img src='Images/sjt.jpg'></td> <td>" ,$row['Floor'], "</td><td>" , $row['Time'], "</td><td>" ,$row['Day'], "</td><td>" ,$row['Class'] , "</td>";
            echo "</tr>"; 
           }
        }
        else{
            while ($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td> <img src='Images/tt.jpg'></td> <td>" ,$row['Floor'], "</td><td>" , $row['Time'], "</td><td>" ,$row['Day'], "</td><td>" ,$row['Class'] , "</td>";
                echo "</tr>"; 
           }
        }
        echo "</table>";
        echo "</div>";

?>
</body>

</html>