<?php
	// echo "delete linked!";
	class DeleteQuery extends DbConnect
	{
		public function deleteDept($id) {
			$sql = "
				DELETE FROM all_departments 
				WHERE id = :id;
			";
			$delete_query = PDO::prepare($sql);
			$delete_query->execute(['id'=>$id]);
			if ($delete_query ->errorCode() == 0) {
				echo "Sent a delete Query<br>";
				if ($delete_query->rowCount() !==0 ) {
					echo "Deleted record Successfully";
					return ['status'=>"true", 'message'=>"Deleted record Successfully"];
				}else {
					echo "delete query did not Succeed";
					return ['status'=>"false", 'message'=>"delete query failed"];
				}
			}
			else {
				$error = $delete_query->errorInfo();
				echo "delete query was not sent Successful!";
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
		public function deleteJob($id) {
			$sql = "
				DELETE FROM all_jobs 
				WHERE id = :id;
			";
			$delete_query = PDO::prepare($sql);
			$delete_query->execute(['id'=>$id]);
			if ($delete_query ->errorCode() == 0) {
				echo "Sent a delete Query<br>";
				if ($delete_query->rowCount() !==0 ) {
					echo "Deleted record Successfully";
					return ['status'=>"true", 'message'=>"Deleted record Successfully"];
				}else {
					echo "delete query did not Succeed";
					return ['status'=>"false", 'message'=>"delete query failed"];
				}
			}
			else {
				$error = $delete_query->errorInfo();
				echo "delete query was not sent Successful!";
				return ['status'=>"false", 'message'=>"There was an error - " . $error[2] ];
			}
		}
	}
?>