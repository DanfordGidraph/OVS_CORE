<?php
header('Content-Type: application/json');
$errors = array(); //To store errors
$form_data = array(); //Pass back the data to `form.php`
include_once('db_connection.php');
/* Validate the form on the server side */

if (empty($_POST['reg_number'])) { //Name cannot be empty
    $errors['reg_number'] = 'Registration cannot be blank';
}
if (empty($_POST['email'])) { //email cannot be empty
    $errors['email'] = 'email cannot be blank';
}
if (empty($_POST['user_name'])) { //email cannot be empty
    $errors['user_name'] = 'user name cannot be blank';
}
if (empty($_POST['firebase_id'])) { //email cannot be empty
    $errors['firebase_id'] = 'Firebase ID cannot be blank';
}
if (empty($_POST['school'])) { //email cannot be empty
    $errors['school'] = 'school cannot be blank';
}

if (!empty($errors)) { //If errors in validation
    $form_data['success'] = false;
    $form_data['errors']  = $errors;
    $form_data['post_vars'] = $_POST;
}else {
    // Perform queries
    $email = $_POST['email'];
    $reg_number =  $_POST['reg_number'];
    $user_name =  $_POST['user_name'];
    $firebase_id =  $_POST['firebase_id'];
    $firebase_pass =  $_POST['firebase_pass'];
    $school = $_POST['school'];

    $sql_fetch_std = "SELECT * FROM student_details WHERE reg_number = '$reg_number'";
    $sql_fetch_del = "SELECT * FROM delegate_details WHERE reg_number = '$reg_number'";
    $sql_fetch_cand = "SELECT * FROM candidate_details WHERE reg_number = '$reg_number'";

    $fetch_result_std = mysqli_query($con,$sql_fetch_std);
    $fetch_result_del = mysqli_query($con,$sql_fetch_del);
    $fetch_result_cand = mysqli_query($con,$sql_fetch_cand);

    if(mysqli_fetch_row($fetch_result_std)){
        $form_data['sql_result'] = "Failure - Student Already Exists";
    }else if(mysqli_fetch_row($fetch_result_del)){
        $form_data['sql_result'] = "Failure - Delegate Already Exists";
    }else if(mysqli_fetch_row($fetch_result_cand)){
        $form_data['sql_result'] = "Failure - Candidate Already Exists";
    }else{
        $sql_find_cand_del = "SELECT * FROM candidates_and_delegates WHERE reg_number = '$reg_number'";
        $fetch_result_cand_del = mysqli_query($con,$sql_find_cand_del);
        $row = mysqli_fetch_assoc($fetch_result_cand_del);
        if($row){
            $type = $row['designation'];
            if($type == 'delegate'){
                $sql = sprintf("INSERT INTO delegate_details (reg_number,email,user_name,firebase_id,firebase_pass,profile_status,school)  VALUES ('%s','%s','%s','%s','%s','%s','%s')"
                ,mysqli_real_escape_string( $con, $reg_number )
                ,mysqli_real_escape_string( $con, $email )
                ,mysqli_real_escape_string( $con, $user_name )
                ,mysqli_real_escape_string( $con, $firebase_id )
                ,mysqli_real_escape_string( $con, sha1($firebase_pass) )
                ,mysqli_real_escape_string( $con, 'incomplete' )
                ,mysqli_real_escape_string( $con, $school ) );

                $result = mysqli_query( $con, $sql );

                if($result){
                $form_data['sql_result'] = "Success - User Added";
                $form_data['success'] = true;
                }else{
                $form_data['sql_result'] = "Failure - Database Error";
                }
            }else{
              $sql = sprintf("INSERT INTO candidate_details (reg_number,email,user_name,firebase_id,firebase_pass,profile_status,school)  VALUES ('%s','%s','%s','%s','%s','%s','%s')"
              ,mysqli_real_escape_string( $con, $reg_number )
              ,mysqli_real_escape_string( $con, $email )
              ,mysqli_real_escape_string( $con, $user_name )
              ,mysqli_real_escape_string( $con, $firebase_id )
              ,mysqli_real_escape_string( $con, sha1($firebase_pass) )
              ,mysqli_real_escape_string( $con, 'incomplete' )
              ,mysqli_real_escape_string( $con, $school ) );

                $result = mysqli_query( $con, $sql );

                if($result){
                $form_data['sql_result'] = "Success - User Added";
                $form_data['success'] = true;
                }else{
                $form_data['sql_result'] = "Failure - Database Error";
                }
            }
        }else{
          $sql = sprintf("INSERT INTO student_details (reg_number,email,user_name,firebase_id,firebase_pass,school)  VALUES ('%s','%s','%s','%s','%s','%s')"
          ,mysqli_real_escape_string( $con, $reg_number )
          ,mysqli_real_escape_string( $con, $email )
          ,mysqli_real_escape_string( $con, $user_name )
          ,mysqli_real_escape_string( $con, $firebase_id )
          ,mysqli_real_escape_string( $con, sha1($firebase_pass) )
          ,mysqli_real_escape_string( $con, $school ) );

            $result = mysqli_query( $con, $sql );

            if($result){
            $form_data['sql_result'] = "Success - User Added";
            $form_data['success'] = true;
            }else{
            $form_data['sql_result'] = "Failure - Database Error";
            }
        }

    }

        // $form_data['post_vars'] = $_POST;
    mysqli_close($con);//If not, process the form, and return true on success
}

echo json_encode($form_data);
//Return the data back to form.php


?>
