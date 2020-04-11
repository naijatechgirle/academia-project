<?php
	// echo "update linked!";
	class UpdateQuery extends DbConnect
	{
		public function check_if_email_exists ($email) {
			$sql = "SELECT 1 FROM odp_3_interns WHERE email = :email";
			$check_query = PDO::prepare($sql);
			$check_query->execute([':email'=>$email]);
			return $check_query->fetchColumn(); 
		}
		public function updateDbCreationStage($stage,$email)	{
			$sql = "
				UPDATE all_db_admins 
				SET  creation_stage=:stage
				WHERE email = :email;
			";
			$update_query = PDO::prepare($sql);
			$update_query ->execute(['stage' => $stage,'email'=>$email]);
			if ($update_query ->errorCode() == 0) {
				echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					echo "Updated DB creation stage Successfully, now at: ".$stage;
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}else {
					echo "Updated failed";
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}
				
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successful!";
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function updateJobCatStage($stage)	{
			$sql = "
				UPDATE variablestorage 
				SET  value=:stage
				WHERE variable = `Job cat stage`;
			";
			$update_query = PDO::prepare($sql);
			$update_query ->execute(['stage' => $stage]);
			if ($update_query ->errorCode() == 0) {
				echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					echo "Updated Job Cat stage Successfully, now at: ".$stage;
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}else {
					echo "Updated failed";
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}
				
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successful!";
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function updateFileCatStage($stage)	{
			$sql = "
					UPDATE variablestorage 
					SET  value=:stage
					WHERE variable = `File cat stage`;
				";
			$update_query = PDO::prepare($sql);
			$update_query ->execute(['stage' => $stage]);
			if ($update_query ->errorCode() == 0) {
				echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					echo "Updated Job Cat stage Successfully, now at: ".$stage;
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}else {
					echo "Updated failed";
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}
				
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successful!";
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function updateDbAdminOrg($org,$email)	{
			$sql = "
				UPDATE all_db_admins 
				SET  office=:org
				WHERE email = :email;
			";
			$update_query = PDO::prepare($sql);
			$update_query->execute(['org'=>$org,'email'=>$email]);
			if ($update_query ->errorCode() == 0) {
				echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					echo "Updated admin organisation Successfully";
					return ['status'=>"true", 'message'=>"Updated admin organisation Successfully"];
				}else {
					echo "Update for admin organisation did not Succeed";
					return ['status'=>"false", 'message'=>"Update for admin organisation did not Succeed"];
				}
				
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successful!";
				print_r(['status'=>"false", 'message'=>"There was an error - " . $error[2] ]);
			}
		}
		public function updateDeptName($newDeptName,$id)	{
			$sql = "
				UPDATE all_departments 
				SET  departments=:dept
				WHERE id = :id;
			";
			$update_query = PDO::prepare($sql);
			$update_query->execute(['dept'=>$newDeptName,'id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					echo "Updated ".$newDeptName." Department Successfully";
					return ['status'=>"true", 'message'=>"Updated ".$newDeptName." Department Successfully"];
				}else {
					echo "Update for ".$newDeptName." did not Succeed";
					return ['status'=>"false", 'message'=>"Update for ".$newDeptName." Department failed"];
				}
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successful!";
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function updateOneDetail ($unique_value,$unique_key,$detail_name,$new_value,$table_name) {
			$sql = "UPDATE ".$table_name." 
					SET ".$detail_name."=:new_value
					WHERE ".$unique_key." = :".$unique_key;
			$check_query = PDO::prepare($sql);
			$check_query->execute([$unique_key=>$unique_value,'new_value'=>$new_value]);
			// echo print_r($check_query->errorInfo());

			return $record_array = $check_query->fetch(PDO::FETCH_ASSOC)[$detail_name];
		}
		public function updateDeptHead($newHeadName,$id) {
			$sql = "
				UPDATE all_departments 
				SET  head=:head
				WHERE id = :id;
			";
			$update_query = PDO::prepare($sql);
			$update_query->execute(['head'=>$newHeadName,'id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					echo "Updated ".$newHeadName." Head Title Successfully";
					return ['status'=>"true", 'message'=>"Updated ".$newHeadName." Head Title Successfully"];
				}else {
					echo "Update for admin organisation did not Succeed";
					return ['status'=>"false", 'message'=>"Update for ".$newHeadName." failed"];
				}
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successful!";
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function updateJobName($newJobName,$id) {
			$sql = "
				UPDATE all_jobs 
				SET job_name=:job_name
				WHERE id = :id;
			";
			$update_query = PDO::prepare($sql);
			$update_query->execute(['job_name'=>$newJobName,'id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					echo "Updated ".$newJobName." Job Title Successfully";
					return ['status'=>"true", 'message'=>"Updated ".$newJobName." Job Title Successfully"];
				}else {
					echo "Update for Job name did not Succeed";
					return ['status'=>"false", 'message'=>"Update for ".$newJobName." failed"];
				}
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successful!";
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function updateJobType($newJobType,$id) {
			$sql = "
				UPDATE all_jobs 
				SET job_type=:job_type
				WHERE id = :id;
			";
			$update_query = PDO::prepare($sql);
			$update_query->execute(['job_type'=>$newJobType,'id'=>$id]);
			if ($update_query ->errorCode() == 0) {
				echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					echo "Updated ".$newJobType." Job Type Successfully";
					return ['status'=>"true", 'message'=>"Updated ".$newJobType." Job Type Successfully"];
				}else {
					echo "Update for Job Type did not Succeed";
					return ['status'=>"false", 'message'=>"Update for ".$newJobType." failed"];
				}
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successful!";
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function changePassword($email,$password,$table)	{
			$sql = "
				UPDATE ".$table." 
				SET  password = :password
				WHERE email = :email;
			";
			$update_query = PDO::prepare($sql);
			$update_query ->execute(['password' => $password,'email'=>$email]);
			if ($update_query ->errorCode() == 0) {
				// echo "Sent an update Query<br>";
				if ($update_query->rowCount() !==0 ) {
					// echo "Updated password Successfully, now at: ".$password;
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}else {
					echo "Updated failed";
					return ['status'=>"true", 'message'=>"Record updated Successfully"];
				}
				
			}
			else {
				$error = $update_query->errorInfo();
				echo "Update query was not sent Successfully!";
				print_r($error);
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
	}
?>