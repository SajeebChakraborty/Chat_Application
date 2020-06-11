
<!--
//login.php
!-->

<html>  
    <head>  
        <title>WeChat</title>  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>  
    <body>  
        <div class="container">
   <br />
   
   <h3 align="center">WeChat</a></h3><br />
   <br />
   <div class="panel panel-default">
      <div class="panel-heading">কনফার্মেশন এর জন্যে</div>
    <div class="panel-body">
     <form method="post">
      
      <div class="form-group">
       <label>ইউজার নাম</label>
       <input type="text" name="username" class="form-control" required />
      </div>
      <div class="form-group">
       <label>পার্সওয়ার্ড</label>
       <input type="password" name="password" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="searching" class="btn btn-info" value="Delect" /></br></br>

      
       
      </div>
     
      
     </form>

    </div>
   </div>
  </div>
  
    </body>  
</html>



<?php




   
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "chat";
    
    $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

    if (mysqli_connect_error()){

      die('Connect Error ('. mysqli_connect_errno() .') '
      . mysqli_connect_error());

    }
    
    if(isset($_POST['searching'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql2 = "SELECT * FROM login WHERE username='$username' AND password='$password'";
        //echo $id2;
        $result = mysqli_query($conn, $sql2);
    
        if (mysqli_num_rows($result) ==1) {
    
    
      
    
            $sql = "UPDATE login SET delect='yes' WHERE username='$username' AND password='$password'";
    
          if (mysqli_query($conn, $sql)) {
    
             echo '<script>alert("Congrats! Delect Account successfully")</script>'; 
             echo '<meta http-equiv="refresh" content="1; URL=login.php" />';
             // echo "<br><br><center><font color=Red>Delect Account succssfully !</font></center";
            //echo "Delect Account succssfully";
    
          } 
          else {
    
            echo "Error delecting record: " . mysqli_error($conn);
    
          }
        }
        else{


            echo "<br><br><center><font color=Red>দুঃখিত ! আপনি ভুল তথ্য দিচ্ছেন</font></center";


        }
    
      }
    
      mysqli_close($conn);
      

?>
<!DOCTYPE html>
<html>
  <head>

    <title></title>

  </head>
  <body>

    <center>
        
        <br>
        <br>
        <br>
        <i><p> POWERED BY </p></i>
        <b><p>Sajeeb Chakraborty </p></b>

    </CENTER>
    


  </body>
</html>
