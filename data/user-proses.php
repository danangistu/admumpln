<?php
	session_start();
	require_once "db-connect.php";
	require_once "../function/function.php";

	if (isset($post_submit)){
		if($post_submit=="set"){
			$id 	= $post_id;
			$role = implode(",", $post_check);

			$row = R::load('user',$id);
			$row->level = 'Admin';
			$row->role  = $role;
			$id = R::store( $row );
			$_SESSION['admumAlert']='1';
			redirect("/admumpln/user");
		}
		if($post_submit=="unset"){
			$id  = $post_id;
			$row = R::load('user',$id);
			$row->level = 'User';
			$row->role  = 'a,k';
			$id = R::store( $row );
			$_SESSION['admumAlert']='1';
			redirect("/admumpln/user");
		}
		if($post_submit=="Edit"){
			$id 	= $post_id;
			try{
				if (isset($post_password)){
					if (isset($post_password2)){
						if($post_password == $post_password2){
							if (isset($post_check)){
								$role = implode(",", $post_check);
								$row = R::load('user',$id);
								$row->username = $post_username;
								$row->password = $post_password;
								$row->role     = $role;
								$id = R::store( $row );
							}else{
								$row = R::load('user',$id);
								$row->username = $post_username;
								$row->password = $post_password;
								$id = R::store( $row );
							}
							$_SESSION['admumAlert']='1';
							redirect("/admumpln/user");
						}else{
							$_SESSION['admumAlert']='Password tidak cocok!';
							redirect("/admumpln/user");
						}
					}else{
						$_SESSION['admumAlert']='Re-Password belum diisi!';
						redirect("/admumpln/user");
					}
				}else{
					if (isset($post_check)){
						$role = implode(",", $post_check);
						$row = R::load('user',$id);
						$row->username = $post_username;
						$row->role     = $role;
						$id = R::store( $row );
					}else{
						$row = R::load('user',$id);
						$row->username = $post_username;
						$id = R::store( $row );
					}
					$_SESSION['admumAlert']='1';
					redirect("/admumpln/user");
				}
			}catch(Exception $e){
				$_SESSION['admumAlert']='0';
				redirect("/admumpln/user");
			}
		}else{
			$id		= $post_submit;
			try{
				$row = R::load('user',$id);
				R::trash($row);
				$_SESSION['admumAlert']='1';
				redirect("/admumpln/user");
			}catch(Exception $e){
				$_SESSION['admumAlert']='0';
				redirect("/admumpln/user");
			}
		}
	}
?>
