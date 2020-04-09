<?php
	// echo 'create Query connected';
	class CreateQuery extends DbConnect
	{	
		public function createDatabase ($db_name) {
			$sql = "CREATE DATABASE ".$db_name;
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Sent a db create query";
				if ($create_query->rowCount() !==0 ) {
					echo "Database creation was Successful";
					return ['status'=>"true", 'message'=>"Database Created Successfully"];
				}else {
					echo "Database creation failed";
					return ['status'=>"true", 'message'=>"Database creation failed Successfully"];
				}
			}
			else {
				echo "Database creation query was unsuccessful";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
			// return $check_query->fetchColumn(); 
		}
		public function createVariableStorage () {
			$sql = 
				"CREATE TABLE variableStorage 
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					variable varchar(50),
					value varchar(100)
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Variable Storage Created Successfully";
				return ['status'=>"true", 'message'=>"Variable Storage Created Successfully"];
			}
			else {
				echo "Variable Storage Creation failed";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function createAllFileTypesTable ($dept_name) {
			$sql = 
				"CREATE TABLE all_file_types_in_".$dept_name."
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					generic_name varchar(80),
					number_existing varchar(100),
					sensitivity varchar(20),
					date_created varchar(10),
					comments varchar(250)
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "All file types table for ".$dept_name." Created Successfully";
				return ['status'=>"true", 'message'=>"All file types table for ".$dept_name." Created Successfully"];
			}
			else {
				echo "All file types table for Creation failed";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function createAParticularFileTable ($file_name,$dept_name) {
			$sql = 
				"CREATE TABLE all_files_in_".$dept_name."
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					file_type varchar(80),
					file_name varchar(100),
					sensitivity varchar(20),
					uploaded_by varchar(10),
					date_uploaded varchar(10),
					comments varchar(250),
					name_in_file_path varchar(150)
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "All files table for ".$dept_name." Created Successfully";
				return ['status'=>"true", 'message'=>"All files table for ".$dept_name." Created Successfully"];
			}
			else {
				echo "All files table Creation failed";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function createSchemaWithDept () {
			$sql = 
				"CREATE TABLE organisation_schema 
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					department varchar(100),
					job_category varchar(100),
					file_types varchar(100),
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Sent a query to create organisation schema";
					if ($create_query->rowCount() !==0 ) {
						echo "Organisation schema Table was created Successfully";
						return ['status'=>"true", 'message'=>"Record updated Successfully"];
					}else {
						echo "Creating Organisation schema failed ";
						return ['status'=>"true", 'message'=>"Record updated Successfully"];
					}
				return ['status'=>"true", 'message'=>"Creation Query for organisation schema sent Successfully"];
			}
			else {
				echo "Creation Query for organisation schema failed";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function createEmployeeDetailsTable ($deptsExist) {
			function sqlValue ($deptsExist) {
				if ($deptsExist) {
					return
					"CREATE TABLE employee_details 
					(
						id int AUTO_INCREMENT PRIMARY KEY,
						first_name varchar(100),
						last_name varchar(100),
						date_of_birth datetime(6),
						gender varchar(20),
						phone_no varchar(20),
						email varchar(150) UNIQUE KEY,
						job_name varchar(150),
						department varchar(150),
						address varchar(200),
						picture_name varchar(255)
					);";
				}else {
					return
					"CREATE TABLE employee_details 
					(
						id int AUTO_INCREMENT PRIMARY KEY,
						first_name varchar(100),
						last_name varchar(100),
						date_of_birth datetime(6),
						gender varchar(20),
						phone_no varchar(20),
						email varchar(150),
						job_name varchar(150),
						address varchar(200),
						picture_name varchar(255)
					);";
				}
			}
			$sql = sqlValue($deptsExist);
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Employee Details Table was created Successfully";
				return ['status'=>"true", 'message'=>"Creation Query for Employee Details Table sent Successfully"];
			}
			else {
				echo "Employee Details Table was not created";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function createDepartmentsTable () {
			$sql = 
				"CREATE TABLE all_departments 
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					departments varchar(150),
					head varchar(100),
					no_of_staff int(11)
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Department Table was created Successfully";
				return ['status'=>"true", 'message'=>"Department Table was created Successfully"];
			}
			else {
				echo "Department Table was not created Successfully";
				$error = $create_query->errorInfo();
				print_r( ['status'=>"false", 'message'=>"There was an error - " . $error[2] ])	;
			}
		}
		public function createJobsTable () {
			$sql = 
				"CREATE TABLE all_jobs 
				(
					id int AUTO_INCREMENT PRIMARY KEY,
					job_name varchar(100),
					job_type varchar(20),
					no_in_organisation int(11)
				);";
			$create_query = PDO::prepare($sql);
			$create_query->execute([]);
			if ($create_query ->errorCode() == 0) {
				echo "Jobs Table was created Successfully";
				return ['status'=>"true", 'message'=>"Jobs Table was created Successfully"];
			}
			else {
				echo "Jobs Table was not created Successfully";
				$error = $create_query->errorInfo();
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
			// return $check_query->fetchColumn(); 
	}
?>