<?php
  session_start();
  include_once 'db_connection.php';
  $return_arr = array();
  if(!isset($_POST['skills']) || !isset($_POST['about']) || !isset($_POST['reg_number']) || !isset($_POST['position']) ){
    $return_arr['status'] = 'failure';
    $return_arr['reason'] = 'missing post variables';
  }else{
      $reg_num = $_POST['reg_number'];
      $sqlstr = "UPDATE candidate_details SET profile_status = 'complete' WHERE reg_number = '$reg_num'";
      $res = mysqli_query($con,$sqlstr);

      if($res){
        $return_arr['status'] = 'success';
        $return_arr['reason'] = 'Sql executed successfully';
        $_SESSION['profile'] = 'complete';
      }else{
        $return_arr['status'] = 'failure';
        $return_arr['reason'] = 'Sql failed to execute';
      }
    }
    echo json_encode($return_arr);
 ?>
