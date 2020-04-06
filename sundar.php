<!doctype html>
<html>
<head>
    <title>job finder</title>
    <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}


li h1 {
  display: block;
  color: white;
  text-align: center;
  align:center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}

</style>
</head>
<body>
   <ul style="align:center;">
  <li><h1>Job Finder</h1></li>
</ul>
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
            echo "<h2> jobs are avilable for these skills you can search jobs by entering these keywords ";
          while($ro = mysqli_fetch_assoc($r)) 
          {
              echo $ro["skill"].", ";
          }
            echo "</h2>";
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