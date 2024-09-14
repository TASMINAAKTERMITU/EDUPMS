<?php


 	//
	// (EDUPMS config file. don't change without knowing what you are doing. study for academic purpose is allowed.)
	//

	// ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ 
	//
	//	Copyright (2024) - OC - (288534) (acacdmml@gmail.com)
	//
	// ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ ____ 


//
ini_set('display_errors', 0);


	// db info
	$server = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'edupms';

	// conn to db
	$con = mysqli_connect( $server, $dbuser, $dbpass, $dbname ) or die ( "Database is not connected." );

	if (!$con) {
		//
		echo " Sorry, the database is not connected! ";
		exit;
	}


 function register_user ( $parameters ) {

 	// make $con global
 	global $con;

 	// check if $user_data is an array
	if( is_array( $parameters ) ) {
		$parameters = $parameters;
	} else {
		return FALSE;
	}

 	// get array length
 	$array_length = sizeof($parameters);

 	// init
 	$i=1;

 	//Organize the values in two strings
    foreach ($parameters as $id => $value) {

    	// feed $fields str
        $fields = $fields . $id;
        if ($i<$array_length) {
        	$fields=$fields.",";
        }

        // feed $values str
        $values = $values . "'" . $value . "'"; 
        if ($i<$array_length) {
        	$values=$values.",";
        }

        $i=$i+1;
    }

 	// insert data
	$sql = "INSERT INTO users ( $fields ) VALUES ( $values )";


	if ( mysqli_query( $con, $sql ) ) {
		# code...
		echo "Data inserted successfully.";

	} else {
		# code...
		echo "Database error";
	}

 }

 function register_user_doct ( $parameters ) {

 	// make $con global
 	global $con;

 	// check if $user_data is an array
	if( is_array( $parameters ) ) {
		$parameters = $parameters;
	} else {
		return FALSE;
	}

 	// get array length
 	$array_length = sizeof($parameters);

 	// init
 	$i=1;

 	//Organize the values in two strings
    foreach ($parameters as $id => $value) {

    	// feed $fields str
        $fields = $fields . $id;
        if ($i<$array_length) {
        	$fields=$fields.",";
        };

        // feed $values str
        $values = $values . "'" . $value . "'"; 
        if ($i<$array_length) {
        	$values=$values.",";
        };

        $i=$i+1;
    }


 	// insert data
	$sql = "INSERT INTO doctors ( $fields ) VALUES ( $values )";
    //$sql = "INSERT INTO users ( name, pass, email, phone ) VALUES ( '$name', '$pass', '$email', '$phone' )";



	if ( mysqli_query( $con, $sql ) ) {
		# code...
		echo "Data inserted successfully.";

	} else {
		# code...
		echo "Database error";
	}


 }


function login_user ($user_data) {
          
          // 
          global $con;

          // get num_rows
          $email_pass_row = check_rows_by_email_pass ( $con, $user_data['email'], $user_data['pass'] );

          //
          if ($email_pass_row == 1) {

           //
           $_SESSION['user_login'] = 1;
           //$_SESSION['active_user'] = "Ahmed"; // get from db
           //$_SESSION['active_patient_id'] = "user123"; // get from db

           //SESSION['active_user_email'] = $user_data['email'];
           //$_SESSION['active_userid'] = $user_data['userid'];

           //
           //echo "Log in successful.";
           header("Location: admin/d-admin.php");

           //return true;
           } else {
             echo "Incorrect username / password. Try again.";
           }

          
}


 function check_rows_by_email ( $con, $email ) {

	// sql query statement
	$sql = " SELECT * FROM users WHERE email= '$email' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	// rows container
	$rows = mysqli_num_rows( $query );

	// return
	return $rows;

 }


  function check_rows_by_email_doct ( $con, $email ) {

	// sql query statement
	$sql = " SELECT * FROM doctors WHERE email= '$email' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	// rows container
	$rows = mysqli_num_rows( $query );

	// return
	return $rows;

 }


 function check_rows_by_email_pass ( $con, $email, $pass ) {

	// sql query statement
	$sql = " SELECT * FROM users WHERE email='$email' AND pass='$pass' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$rows =  mysqli_num_rows ($query);
	//$rows =  $query->num_rows ;

	// return
	return $rows;

 }

 function get_user_name_by_email ( $con, $email ) {

	// sql query statement
	$sql = " SELECT name FROM users WHERE email= '$email' ";

	// mysqli query
	//$query = mysqli_query( $con, $sql );

	//
	//$sql = "SELECT colname FROM tablename WHERE name = 'Akib";
	$record = mysqli_query( $con, $sql );
	$row = mysqli_fetch_row( $record );

	// return
	return $row[0];

 }


 function update_pass ( $email, $pass ) {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " UPDATE users SET pass="$pass" WHERE email="$email" ";
	$sql = " UPDATE users SET pass='$pass' WHERE email='$email' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//
	// echo "<pre>";
	// print_r($row);
	// echo "<pre>";
	
	// return
	return $query;

 }


 function retrieve_patient_profile_data ( $patient_id ) {

 	//
 	global $con;

	// sql query statement
	$sql = " SELECT * FROM users WHERE patient_id='$patient_id' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$assoc_array =  mysqli_fetch_assoc ($query);
	//$rows =  $query->num_rows ;


	// return
	return $assoc_array;

 }


function write_appointment ( $parameters ) { // successful

 	// make $con global
 	global $con;

 	// check if $user_data is an array
	if( is_array( $parameters ) ) {
		$parameters = $parameters;
	} else {
		return FALSE;
	}

 	// get array length
 	$array_length = sizeof($parameters);

 	// init
 	$i=1;

 	//Organize the values in two strings
    foreach ($parameters as $id => $value) {

    	// feed $fields str
        $fields = $fields . $id;
        if ($i<$array_length) {
        	$fields=$fields.",";
        };

        // feed $values str
        $values = $values . "'" . $value . "'"; 
        if ($i<$array_length) {
        	$values=$values.",";
        };

        $i=$i+1;
    }


 	// insert data
	$sql = "INSERT INTO appointment ( $fields ) VALUES ( $values )";
    //$sql = "INSERT INTO users ( name, pass, email, phone ) VALUES ( '$name', '$pass', '$email', '$phone' )";

	// echo "<pre>";
	// print_r($sql);
	// echo "<pre>";

	//
	$result = mysqli_query( $con, $sql );

	// if successfull, will return 1
	return $result;

 }


function write_prescription ( $parameters ) { //

 	// make $con global
 	global $con;

 	// check if $user_data is an array
	if( is_array( $parameters ) ) {
		$parameters = $parameters;
	} else {
		return FALSE;
	}

 	// get array length
 	$array_length = sizeof($parameters);

 	// init
 	$i=1;

 	//Organize the values in two strings
    foreach ($parameters as $id => $value) {

    	// feed $fields str
        $fields = $fields . $id;
        if ($i<$array_length) {
        	$fields=$fields.",";
        };

        // feed $values str
        $values = $values . "'" . $value . "'"; 
        if ($i<$array_length) {
        	$values=$values.",";
        };

        $i=$i+1;
    }


 	// insert data
	$sql = "INSERT INTO prescription ( $fields ) VALUES ( $values )";
    //$sql = "INSERT INTO users ( name, pass, email, phone ) VALUES ( '$name', '$pass', '$email', '$phone' )";

	// echo "<pre>";
	// print_r($sql);
	// echo "<pre>";

	//
	$result = mysqli_query( $con, $sql );

	// if successfull, will return 1
	return $result;
	
 }

 function retrieve_data_appointment ( $given_id ) {

 	//
 	global $con;

	// sql query statement
	$sql = " SELECT * FROM appointment WHERE patient_id='$given_id' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$assoc_array =  mysqli_fetch_assoc ($query);
	//$rows =  $query->num_rows ;
	//var_dump($row);

	//
	// echo "<pre>";
	// print_r($row);
	// echo "<pre>";


	// return
	return $assoc_array;

 }

  function retrieve_user_passport_data ( $email ) {

 	//
 	global $con;

	// sql query statement
	$sql = " SELECT name, patient_id, role FROM users WHERE email='$email' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$assoc_array =  mysqli_fetch_assoc ($query);
	//$rows =  $query->num_rows ;


	// return
	return $assoc_array;

 }


 function update_pass_with_usr_id_pat ( $tbl_nm, $pat_usr_id, $pass ) {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " UPDATE users SET pass="$pass" WHERE email="$email" ";
	$sql = " UPDATE $tbl_nm SET pass='$pass' WHERE patient_id='$pat_usr_id' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//
	// echo "<pre>";
	// print_r($row);
	// echo "<pre>";
	
	// return
	return $query;

 }


  function update_pass_with_usr_id_doct ( $tbl_nm, $doct_usr_id, $pass ) {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " UPDATE users SET pass="$pass" WHERE email="$email" ";
	$sql = " UPDATE $tbl_nm SET pass='$pass' WHERE doctor_id='$doct_usr_id' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//
	// echo "<pre>";
	// print_r($row);
	// echo "<pre>";
	
	// return
	return $query;

 }


 function check_rows_by_pass_pat ( $tbl_nm, $pat_usr_id, $pass ) {

 	// make $con global
 	global $con;

	// sql query statement
	$sql = " SELECT * FROM $tbl_nm WHERE patient_id='$pat_usr_id' AND pass='$pass' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$rows =  mysqli_num_rows ($query);
	//$rows =  $query->num_rows ;

	// return
	return $rows;

 }

  function check_rows_by_pass_doct ( $tbl_nm, $doct_usr_id, $pass ) {

 	// make $con global
 	global $con;

	// sql query statement
	$sql = " SELECT * FROM $tbl_nm WHERE doctor_id='$doct_usr_id' AND pass='$pass' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$rows =  mysqli_num_rows ($query);
	//$rows =  $query->num_rows ;

	// return
	return $rows;

 }


function pass_confirmation_pat ( $tbl_nm, $pat_usr_id, $pass ) {
          
          // 
          global $con;

          // get num_rows
          $pass_row = check_rows_by_pass_pat ( $tbl_nm, $pat_usr_id, $pass );

          //
          if ($pass_row == 1) {
           //
           return 1;
          }        
}

function pass_confirmation_doct ( $tbl_nm, $doct_usr_id, $pass ) {
          
          // 
          global $con;

          // get num_rows
          $pass_row = check_rows_by_pass_doct ( $tbl_nm, $doct_usr_id, $pass );

          //
          if ($pass_row == 1) {
           //
           return 1;
          }        
}

  function get_user_name ( $p_id ) {

 	//
 	global $con;

	// sql query statement
	$sql = " SELECT name FROM users WHERE patient_id='$p_id' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$assoc_array =  mysqli_fetch_assoc ($query);
	//$rows =  $query->num_rows ;


	// return
	return $assoc_array;

 }



  function dashboard_registered_patients () {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " SELECT * FROM appointment" WHERE doct_id='$given_id' ";
	$sql = " SELECT * FROM appointment ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$rows =  mysqli_num_rows ($query);
	//$rows =  $query->num_rows ;

	// return
	return $rows;

 }

   function dashboard_patients_visited () {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " SELECT * FROM appointment WHERE doct_id='$given_doct_id' AND visited_flag=1";
	$sql = " SELECT * FROM appointment WHERE visited_flag='Visited' ";


	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$rows =  mysqli_num_rows ($query);
	//$rows =  $query->num_rows ;

	// null case adjustment
	if ($rows == NULL) {
		//
		$rows = 0;
	}

	// return
	return $rows;

 }

 function update_visited_flag_appoint_tbl ( $given_pid ) {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " UPDATE users SET pass="$pass" WHERE email="$email" ";
	$sql = " UPDATE appointment SET visited_flag='Visited' WHERE patient_id='$given_pid' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//
	// echo "<pre>";
	// print_r($row);
	// echo "<pre>";
	
	// return
	return $query;

 }

  function single_doct_appointment_count ($patient_id) {

 	//
 	global $con;

	// sql query statement
	$sql = " SELECT new_appointment_lock FROM users WHERE patient_id='$patient_id' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$assoc_array =  mysqli_fetch_assoc ($query);
	//$rows =  $query->num_rows ;


	// return
	return $assoc_array;

 }

 function update_single_doct_appointment_flag ( $given_pid ) {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " UPDATE users SET pass="$pass" WHERE email="$email" ";
	$sql = " UPDATE users SET new_appointment_lock = 1  WHERE patient_id='$given_pid' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//
	// echo "<pre>";
	// print_r($row);
	// echo "<pre>";
	
	// return
	return $query;

 }


  function dashboard_total_appointments ($given_did, $patient_id) {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " SELECT * FROM appointment" WHERE doct_id='$given_id' ";
	$sql = " SELECT * FROM appointment WHERE patient_id='$patient_id' AND doctor_id='$given_did' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$rows_count =  mysqli_num_rows ($query);
	//$rows =  $query->num_rows ;

	// return
	return $rows_count;

 }

   function dashboard_doctors_visited ($given_did, $patient_id) {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " SELECT * FROM appointment WHERE doct_id='$given_doct_id' AND visited_flag=1";
	$sql = " SELECT * FROM appointment WHERE doctor_id='$given_did' AND patient_id='$patient_id' AND visited_flag='Visited' ";


	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$rows =  mysqli_num_rows ($query);
	//$rows =  $query->num_rows ;

	// null case adjustment
	if ($rows == NULL) {
		//
		$rows = 0;
	}


	// return
	return $rows;

 }

  function prescription_already_written_status ($doctor_id, $patient_id) {

 	//
 	global $con;

	// sql query statement
	$sql = " SELECT visited_flag FROM appointment WHERE doctor_id='$doctor_id' AND patient_id='$patient_id' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//var_dump($query->num_rows);

	// rows container
	$assoc_array =  mysqli_fetch_assoc ($query);
	//$rows =  $query->num_rows ;


	// return
	return $assoc_array;

 }

 function update_pat_usr_info_settings ( $patient_id, $name, $phone, $profession, $address ) {

 	// make $con global
 	global $con;

	// sql query statement
	//$sql = " UPDATE users SET pass="$pass" WHERE email="$email" ";
	$sql = " UPDATE users SET name='$name', phone='$phone', profession='$profession', address='$address' WHERE patient_id='$patient_id' ";

	// mysqli query
	$query = mysqli_query( $con, $sql );

	//
	// echo "<pre>";
	// print_r($row);
	// echo "<pre>";
	
	// return
	return $query;

 }


?>


