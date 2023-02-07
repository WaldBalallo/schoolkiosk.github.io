<?php 
	

include '../database_connection/config.php';
session_start();
		
		if(isset($_POST['login']))
		{

			$emailUserName = $_POST['emailUsername'];
			$password = md5($_POST['password']);
			
			$stmt = $conn->prepare("SELECT * FROM admin WHERE email=? || username=? AND password=? ");
			$stmt->execute([$emailUserName, $emailUserName, $password]);
			while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$admin_id = $data['id'];
						$admin_username = $data['username'];
						$email = $data['email'];
						$pword = $data['password'];
					}

					$_SESSION['auth'] = true;
					$_SESSION['auth_user'] = [

						'admin_id' => $admin_id,
						'admin_Username' =>$admin_username,
						'email'=>$email,
					];


			         if($pword == $password)
			         {

			         	

							$_SESSION['status'] = "LOGIN SUCCESS";
							$_SESSION['status-code'] = "success";
							header("location: dashboard.php");
				        
				       
			        	
			         }else{
	        				$_SESSION['status'] = "INCORRECT LOGIN DETAILS";
							$_SESSION['status-code'] = "error";
		        			header("location: index.php");
	        				}
			        
				
				}

?>
