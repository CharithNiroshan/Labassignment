<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $start=$_REQUEST['start'];
    try {
        $conn = new PDO("mysql:host=localhost;dbname=world", "root", "");

        echo 'Connected to the database.<br>';
        
        foreach(range('A','Z') as $letter)
        {
          echo "&nbsp;<a href=lab.php?start=".$letter.">".$letter."</a> &nbsp;";
        }

        echo "<br>";

       
        $sql = "SELECT Name FROM country WHERE continent=Name LIKE '".$start."%' ";

        $stmt=$conn->prepare($sql);

        $stmt->execute();

        $result=$stmt->fetchAll();
        
        foreach($result as $row)
        {
            echo $row['Name'] . "<br>";
        }
  
        $conn = null;
    
      }
      catch(PDOException $err) {
        echo "ERROR: Unable to connect: " . $err->getMessage();
      }
    ?>
</body>
</html>