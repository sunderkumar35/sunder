<!doctype html>
<html>
<head>
    <title>job finder</title>
</head>
<body>
    <?php
    
    ?>
        <form method="POST">
            <table>
                <tr><td><label for="name">Enter Name</label></td><td><input type="text" name="name" id="name" required></td></tr>
                <tr><td><label for="skill">Enter Skill</label></td><td><input type="text" name="skill" id="skill" required></td></tr>
                <tr><td colspan="2" align="center"><input type="submit" name="submit" value="submit"></td></tr>
            </table>
        </form>
        <table border="1">
            <tr ><th>Job Title</th><th>Company</th><th>Skill Required</th><th>Description</th></tr>
            <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "sundar";
         // Create connection
         $conn = new mysqli($servername, $username, $password,$dbname);
         
         // Check connection
         if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);}
     $q="select distinct(skill) from job ";
            $r=mysqli_query($conn, $q );
            echo "<p> jobs are avilable for these skills you can search jobs by entering these keywords ";
          while($ro = mysqli_fetch_assoc($r)) 
          {
              echo $ro["skill"].", ";
          }
            echo "</p>";
            if(isset($_POST['submit']))
            {
                $skill=$_POST['skill'];
                $name=$_POST['name'];
            
            $q="select * from job where lower(skill)=lower('$skill')";
            $result=mysqli_query($conn, $q);
          while($row = mysqli_fetch_assoc($result)) 
          {
              echo "<tr><td>" . $row["job"]. "</td><td>" . $row["company"]."</td><td>" . $row["skill"]. "</td><td>" . $row["Description"]. "</td> </tr>";
          }
                echo "<p><strong>".$name." these are jobs applicable to you</strong></p>";
            }
            ?>
        </table>
    </body>
    </html>