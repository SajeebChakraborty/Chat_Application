
<!--
//login.php
!-->

<?php

include('database_connection.php');

session_start();

$message = '';

if(isset($_SESSION['user_id']))
{
 //header('location:index.php');
}

if(isset($_POST["login"]))
{
 $query = "
   SELECT * FROM login 
    WHERE username = :username
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
    array(
      ':username' => $_POST["username"]
     )
  );
  $count = $statement->rowCount();
  if($count > 0)
 {
  $result = $statement->fetchAll();
    foreach($result as $row)
    {
      if($_POST["password"]==$row["password"])
      {
        if($row["delect"]=="no"){

          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          $sub_query = "
          INSERT INTO login_details 
          (user_id) 
          VALUES ('".$row['user_id']."')
          ";
          $statement = $connect->prepare($sub_query);
          $statement->execute();
          $_SESSION['login_details_id'] = $connect->lastInsertId();
          echo '<meta http-equiv="refresh" content="1; URL=index.php" />';



        }
        else{

          $message = "<label>দুঃখিত ! সঠিক ইউজার নাম দিন</label>";

        }
       
      }
      else
      {
       $message = "<label>দুঃখিত ! আপনি ভুল পার্সওয়ার্ড দিচ্ছেন</label>";
      }
    }
 }
 else
 {
  $message = "<label>দুঃখিত ! সঠিক ইউজার নাম দিন</label>";
 }
}

?>

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
      <div class="panel-heading">লগইন প্যানেল</div>
    <div class="panel-body">
     <form method="post">
      <p class="text-danger"><?php echo $message; ?></p>
      <div class="form-group">
       <label>ইউজার নাম</label>
       <input type="text" name="username" class="form-control" required />
      </div>
      <div class="form-group">
       <label>পার্সওয়ার্ড</label>
       <input type="password" name="password" class="form-control" required />
      </div>
      <div class="form-group">
       <input type="submit" name="login" class="btn btn-info" value="লগইন" /></br></br>

       <div align="" color="Red">
       <a href="forget_password.php">পার্সওয়ার্ড ভুলে গেছেন?</a></br></br>
      </div>
      <div align="" color="Red">
       <a href="register.php">রেজিস্ট্রেশন করবেন?</a>
      </div>
       
      </div>
     
      
     </form>

    </div>
   </div>
  </div>
  
    </body>  
</html>
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

