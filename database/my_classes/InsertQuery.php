<?php
	// echo 'insert Query connected';
	class InsertQuery extends DbConnect
	{
		public function check_if_email_exists ($email) {
			$sql = "SELECT 1 FROM odp_3_interns WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			return $check_query->fetchColumn();
		}
		
		public function insertReportStage($stage) {
			$sql = "INSERT INTO variablestorage(variable,value) VALUES(:variable,:value)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['variable'=>'DB Creation Stage', 'value'=>$stage]);
			if ($insert_query ->errorCode() == 0) {
				echo "First progress report inserted Successfully";
				return ['status'=>"true", 'message'=>"Data Inserted Successfully"];
			}
			else {
				echo "First progress report did not insert Successfully!";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function insertJobCategoryStage($stage) {
			$sql = "INSERT INTO variablestorage(variable,value) VALUES(:variable,:value)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['variable'=>'Job cat stage', 'value'=>$stage]);
			if ($insert_query ->errorCode() == 0) {
				echo "Job Cat stage Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					echo "Job Cat stage inserted Successfully";
					return ['status'=>"true", 'message'=>"Job Cat stage inserted Successfully"];
				}else {
					echo "Job Cat stage did not insert Successfully";
					return ['status'=>"false", 'message'=>"Job Cat stage insertion failed"];
				}
			}
			else {
				echo "Job Cat stage Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function insertTopOfficer($top_officer_title) {
			$sql = "INSERT INTO variablestorage(variable,value) VALUES(:variable,:value)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['variable'=>'LP Top Officer', 'value'=>$top_officer_title]);
			if ($insert_query ->errorCode() == 0) {
				echo "Top Officer Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					echo "Top Officer inserted Successfully";
					return ['status'=>"true", 'message'=>"Top Officer inserted Successfully"];
				}else {
					echo "Top Officer did not insert Successfully";
					return ['status'=>"false", 'message'=>"Top Officer insertion failed"];
				}
			}
			else {
				echo "Top Officer Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
		public function insertDeptStatus($dept_exists_status) {
			$sql = "INSERT INTO variablestorage(variable,value) VALUES(:variable,:value)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['variable'=>'Departments exist', 'value'=>$top_officer_title]);
			if ($insert_query ->errorCode() == 0) {
				echo "Top Officer Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					echo "Top Officer inserted Successfully";
					return ['status'=>"true", 'message'=>"Top Officer inserted Successfully"];
				}else {
					echo "Top Officer did not insert Successfully";
					return ['status'=>"false", 'message'=>"Top Officer insertion failed"];
				}
			}
			else {
				echo "Top Officer Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
		public function insertDBAdminDetails($email,$password,$creation_stage,$status) {
			$sql = "INSERT INTO all_db_admins(email,password,creation_stage,status) VALUES(:email,:password,:creation_stage,:status)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['email'=>$email,'password'=>$password,'creation_stage'=>$creation_stage,'status'=>$status]);
			if ($insert_query ->errorCode() == 0) {
				echo "Admin Details Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					echo "Admin Details inserted Successfully";
					return ['status'=>"true", 'message'=>"Admin Details inserted Successfully"];
				}else {
					echo "Admin Details did not insert Successfully";
					return ['status'=>"false", 'message'=>"Admin Details insertion failed"];
				}
			}
			else {
				echo "Admin Details Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
		public function insertOrgName($org) {
			$sql = "INSERT INTO organisation_data(organisation) VALUES(:org)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['org'=>$org]);
			if ($insert_query ->errorCode() == 0) {
				echo "Org Name Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					echo "Org name inserted Successfully";
					return ['status'=>"true", 'message'=>"Org name inserted Successfully"];
				}else {
					echo "Org name did not insert Successfully";
					return ['status'=>"false", 'message'=>"Org name insertion failed"];
				}
			}
			else {
				echo "Org name Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
		public function insertNewFileType($dept_name,$generic_name,$new_number,$sensitivity,$date,$comments) {
			$sql = "INSERT INTO all_files_in_".$dept_name." 
				(
					generic_name,number_existing,sensitivity ,date_created,comments
				) 
				VALUES(:generic_name,:number_existing,: sensitivity ,:date_created,:comments)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'generic_name'=>$file_name,'number_existing'=>$new_number,
					' sensitivity '=>$sensitivity,'date_created'=>$date,'comments'=>$comments
				]);
			if ($insert_query ->errorCode() == 0) {
				echo "New File type Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					// echo "New File type inserted Successfully";
					return ['status'=>"true", 'message'=>"New File type inserted Successfully"];
				}else {
					// echo "New File type did not insert Successfully";
					return ['status'=>"false", 'message'=>"New File type insertion failed"];
				}
			}
			else {
				// echo "New File type Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
		public function insertNewFile($dept_name,$generic_name,$file_name,$new_number,$sensitivity,$uploader,$date,$comments) {
			$sql = "INSERT INTO all_".$generic_name."_in_".$dept_name." 
				(
					generic_name,file_name,number_existing,sensitivity,uploaded_by,date_uploaded,comments
				) 
				VALUES(:generic_name,:file_name,:number_existing,:sensitivity,:uploaded_by,:date_uploaded,:comments)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
				execute([
					'generic_name'=>$generic_name,'file_name'=>$file_name,'number_existing'=>$new_number,
					'sensitivity'=>$sensitivity,'uploaded_by'=>$uploader,'date_created'=>$date,'comments'=>$comments
				]);
			if ($insert_query ->errorCode() == 0) {
				echo "New File Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					// echo "New File inserted Successfully";
					return ['status'=>"true", 'message'=>"New File inserted Successfully"];
				}else {
					// echo "New File did not insert Successfully";
					return ['status'=>"false", 'message'=>"New File insertion failed"];
				}
			}
			else {
				// echo "New File Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2]];
			}

		}
		public function getAllDepts () {
			$sql = "SELECT  departments FROM all_departments";
			$check_query = PDO::prepare($sql);
			$check_query->execute([]);
			echo print_r($check_query->errorInfo());
			
			return $record_array = $check_query->fetchAll(PDO::FETCH_ASSOC);
		}
		public function insertDepartment($dept,$head) {
			$sql = "INSERT INTO all_departments(departments,head) VALUES(:dept,:head)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['dept'=>$dept,'head'=>$head]);
			if ($insert_query ->errorCode() == 0) {
				// echo "Department Insert Q	uery Sent";
				if ($insert_query->rowCount() !==0 ) {
					// echo "Department inserted Successfully";
					return ['status'=>"true", 'message'=>"Department inserted Successfully"];
				}else {
					echo "Department did not insert Successfully";
					return ['status'=>"false", 'message'=>"Department insertion failed"];
				}
			}
			else {
				echo "Department Insert Query did not send";
				print_r($error = $insert_query->errorInfo());
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
			public function insertJob($job_name,$job_type) {
			$sql = "INSERT INTO all_jobs(job_name,job_type) VALUES(:job_name,:job_type)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> execute(['job_name'=>$job_name,'job_type'=>$job_type]);
			if ($insert_query ->errorCode() == 0) {
				// echo "Job Insert Query Sent";
				if ($insert_query->rowCount() !==0 ) {
					// echo "Job inserted Successfully";
					return ['status'=>"true", 'message'=>"Job inserted Successfully"];
				}else {
					echo "Job did not insert Successfully";
					return ['status'=>"false", 'message'=>"Job insertion failed"];
				}
			}
			else {
				echo "Job Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}

		}
		public function insertUserData
		(
			$fname,$lname,$dob,$gender,$phone_no,$email,$job,$dept,$address,$picture_name
		){
			
			$sql = "INSERT INTO employee_details
			(
				first_name,last_name,date_of_birth,
				gender,phone_no,email,job_name,
				department,address,picture_name
			) 
			VALUES(
				:fname,:lname,:dob,:gender,
				:phone_no,:email,:job,
				:dept,:address,:picture_name
			)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
			execute([
				'fname'=>$fname,'lname'=>$lname,'dob'=>$dob,
				'gender'=>$gender,'phone_no'=>$phone_no,
				'email'=>$email,'job'=>$job,'dept'=>$dept,
				'address'=>$address,'picture_name'=>$picture_name
			]);
			
			if ($insert_query ->errorCode() == 0) {
				// echo "user data Insert Query sent Successfully";
				if ($insert_query->rowCount() !==0 ) {
					// echo "user data logged Successfully";
					return ['status'=>true, 'message'=>"user data logged Successfully"];
				}else {
					// echo "user data did not insert Successfully";
					return ['status'=>false, 'message'=>"user data insertion failed"];
				}
			}
			else {
				// echo "user data Insert Query did not send";
				$error = $insert_query->errorInfo();
				print_r($error);
				return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function insertFileData
		(
			$file_type,$file_name,$sensitivity,$uploader_id,$date_uploaded,$comments,$name_in_file_path,$dept
		){
			
			$sql = "INSERT INTO all_files_in_".$dept."
			(
				file_type,file_name,sensitivity,
				uploader_id,date_uploaded,comments,name_in_file_path
			) 
			VALUES(
				:file_type,:file_name,:sensitivity,
				:uploader_id,:date_uploaded,:comments,
				:name_in_file_path
			)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
			execute([
				'file_type'=>$file_type,'file_name'=>$file_name,'sensitivity'=>$sensitivity,
				'uploader_id'=>$uploader_id,'date_uploaded'=>$date_uploaded,
				'comments'=>$comments,'name_in_file_path'=>$name_in_file_path
			]);
			
			if ($insert_query ->errorCode() == 0) {
				// echo "file data Insert Query sent Successfully";
				if ($insert_query->rowCount() !==0 ) {
					// echo "file data logged Successfully";
					return ['status'=>true, 'message'=>"file data logged Successfully"];
				}else {
					// echo "file data did not insert Successfully";
					return ['status'=>false, 'message'=>"file data insertion failed"];
				}
			}
			else {
				// echo "file data Insert Query did not send";
				$error = $insert_query->errorInfo();
				print_r($error);
				return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		// public function insertuserData
		// (
		// 	$fname,$lname,$dob,$gender,$phone_no,$email,$job,$dept,$address,$picture_name
		// ){
		
		// 	$sql = "INSERT INTO user_details
		// 	(
		// 		first_name,last_name,date_of_birth,
		// 		gender,phone_no,email,job_name,
		// 		address,picture_name
		// 	) 
		// 	VALUES(
		// 		:fname,:lname,:dob,:gender,
		// 		:phone_no,:email,:job,
		// 		:address,:picture_name
		// 	)";
		// 	$insert_query = PDO::prepare($sql);
		// 	$insert_query -> 
		// 	execute([
		// 		'fname'=>$fname,'lname'=>$lname,'dob'=>$dob,
		// 		'gender'=>$gender,'phone_no'=>$phone_no,
		// 		'email'=>$email,'job'=>$job,
		// 		'address'=>$address,'picture_name'=>$picture_name
		// 	]);
		
		// 	if ($insert_query ->errorCode() == 0) {
		// 		// echo "user data Insert Query sent Successfully";
		// 		if ($insert_query->rowCount() !==0 ) {
		// 			// echo "user data logged Successfully";
		// 			return ['status'=>true, 'message'=>"user data logged Successfully"];
		// 		}else {
		// 			echo "user data did not insert Successfully";
		// 			return ['status'=>false, 'message'=>"user data insertion failed"];
		// 		}
		// 	}
		// 	else {
		// 		echo "user Data Insert Query did not send";
		// 		$error = $insert_query->errorInfo();
		// 		return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
		// 	}
		// }
			public function insertAdminData
		(
			$fname,$lname,$dob,$gender,$phone_no,$email,$job,$dept,$address,$picture_name
		){
		
			$sql = "INSERT INTO user_details
			(
				first_name,last_name,date_of_birth,
				gender,phone_no,email,job_name,
				department,address,picture_name
			) 
			VALUES(
				:fname,:lname,:dob,:gender,
				:phone_no,:email,:job,:dept,
				:address,:picture_name
			)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
			execute([
				'fname'=>$fname,'lname'=>$lname,'dob'=>$dob,
				'gender'=>$gender,'phone_no'=>$phone_no,
				'email'=>$email,'job'=>$job,'dept'=>$dept,
				'address'=>$address,'picture_name'=>$picture_name
			]);
			
			if ($insert_query ->errorCode() == 0) {
				if ($insert_query->rowCount() !==0 ) {
					return ['status'=>true, 'message'=>"Admin data logged Successfully"];
				}else {
					echo "Admin data did not insert Successfully";
					return ['status'=>false, 'message'=>"Admin data insertion failed"];
				}
			}
			else {
				echo "Admin data Insert Query did not send";
				$error = $insert_query->errorInfo();
				print_r($error);
				return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}

		public function insertLessPaperUser($fullname,$email,$office,$dept,$role) {
			$sql = "INSERT INTO less_paper_users
			(
				full_name,email,office,department,role
			) 
			VALUES(
				:full_name,:email,:office,:department,:role
			)";
			$insert_query = PDO::prepare($sql);
			$insert_query -> 
			execute([
				'full_name'=>$fullname,'email'=>$email,
				'office'=>$office,'department'=>$dept,'role'=>$role
			]);
			
			if ($insert_query ->errorCode() == 0) {
				// echo "Less Paper Insert Query sent Successfully";
				if ($insert_query->rowCount() !==0 ) {
					// echo "Less Paper logged Successfully";
					return ['status'=>true, 'message'=>"Less Paper logged Successfully"];
				}else {
					echo "Less Paper did not insert Successfully";
					return ['status'=>false, 'message'=>"Less Paper insertion failed"];
				}
			}
			else {
				echo "Less Paper Insert Query did not send";
				$error = $insert_query->errorInfo();
				return ['status'=>false, 'message'=>"There was an error - " . $error[2] ];
			}
		}
		
		
	}

?>
