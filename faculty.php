<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="faculty.css">
    <style>
        body {
            background:none;
        }
        h1 {
            color:rgb(27, 119, 239)
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
    </style>
</head>

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
            $Faculty = $_POST['FacultySearch'];
            $time = $_POST['time'];
            $day = $_POST['days'];
        }
        

        $db_selected = mysqli_select_db($connection,"empty room");
        if (!$db_selected)
            {
                die ("Can\'t use test_db : " . mysql_error());
            }
        else{
            // echo "Database selected successfully !";
        }
        echo "<div contain>";
        echo "<h1>Here are the results...</h1>";
        $query = "SELECT * FROM `empty_details` WHERE (`Faculty`= '$Faculty' OR `employee_ID` = '$Faculty') AND `Time` = '$time' AND `Day` =  '$day' ";

        $result = mysqli_query($connection,$query) or die("Query Failed : ".mysqli_error());

        echo "<table>";
        // echo "<table border='1'>";
        echo "<tr>";
        echo "<th> Faculty Name </th><th> Time </th><th> Day </th><th> Room No.</th>";
        echo "</tr>";


        while ($row = mysqli_fetch_array($result)){
            // echo $row['Class'];
            echo "<tr>";
            // echo "<td> <img src=".$row['image']."></td><td>".$row['Faculty']. "</td><td>" . $row['Time']. "</td><td>" .$row['Day']. "</td><td>" .$row['Class'] . "</td>";
            // echo "</tr>"; 
            echo "<td>".$row['Faculty']. "</td><td>" . $row['Time']. "</td><td>" .$row['Day']. "</td><td>" .$row['Class'] . "</td>";
            echo "</tr>"; 
        }
        echo "</table>";
        echo "</div>";

        ?>
</body>

</html>