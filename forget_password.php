
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
      <div class="panel-heading">পার্সওয়ার্ড উদ্ধার</div>
    <div class="panel-body">
     <form method="post">
    
      <div class="form-group">
       <label>ইউজার নাম</label>
       <input type="text" name="username" class="form-control" required />
      </div>
      <div class="form-group">
       <label>মোবাইল নাম্বার</label>
       <input type="text" name="mobile" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="searching" class="btn btn-info" value="সাবমিট" /></br></br>

       <div align="" color="Red">
       <a href="login.php">লগইন?</a></br></br>
      </div>
      
       
      </div>
     
      
     </form>

    </div>
   </div>
  </div>
  
    </body>  
</html>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat";
 //$name = filter_input(INPUT_POST, 'name');
 // Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
if (!$conn) {

  die("Connection failed: " . mysqli_connect_error());

}
if(isset($_POST['searching'])){

  $username = $_POST['username'];
  $mobile = $_POST['mobile'];
  //$contact = $_POST['contact'];

  $sql2 = "SELECT * FROM login WHERE username='$username' AND mobile='$mobile'";
  $result = mysqli_query($conn, $sql2);

  if (mysqli_num_rows($result) ==1) {

      while($row = mysqli_fetch_assoc($result)) {

          echo " <center><font color=Red><h2><br> পার্সওয়ার্ড: " . $row["password"]. "<br></h2></font> </center>";

      }
             

  }
  else{

    echo "<br><br><center><font color=Red>দুঃখিত ! আপনি ভুল তথ্য দিচ্ছেন</font></center";
    

  }

}
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
<?php
//echo 'User IP - '.$_SERVER['REMOTE_ADDR'];
function getUserIpAddr(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

