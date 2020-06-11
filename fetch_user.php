<?php

//fetch_user.php

include('database_connection.php');

session_start();

$query = "
SELECT * FROM login 
WHERE user_id != '".$_SESSION['user_id']."' 
AND delect='no'
";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$output = '
<table class="table table-bordered table-striped">
 <tr>
  <th>ইউজার নাম</th>
  <th>স্ট্যাটাস</th>
  <th>চ্যাট / বার্তা প্রেরণ</th>
 </tr>
';

foreach($result as $row)
{
 $status = '';
 
 $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
 $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
 $user_last_activity = fetch_user_last_activity($row['user_id'], $connect);

 if($user_last_activity > $current_timestamp)
 {
  $status = '<span class="label label-success">অনলাইন</span>';
 }
 else
 {
  $status = '<span class="label label-danger">অফলাইন</span>';
 }
 $output .= '
 <tr>
  <td>'.$row['username'].' '.count_unseen_message($row['user_id'], $_SESSION['user_id'], $connect).'</td>
  <td>'.$status.'</td>
  <td><button type="button" class="btn btn-info btn-xs start_chat" data-touserid="'.$row['user_id'].'" data-tousername="'.$row['username'].'">শুরু করি</button></td>
 </tr>
 ';
}

$output .= '</table>';

echo $output;

?>