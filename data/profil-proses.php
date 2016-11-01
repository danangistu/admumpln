<?php
	session_start();
	require_once "db-connect.php";
	require_once "../function/function.php";

	$nip	= $_SESSION['admumNip'];
	if(isset($post_submit)){
		if ($post_submit=="foto"){
			$foto	= $post_foto;
			if ($_FILES["file"]["error"] > 0) {
				redirect("/admumpln/profil");
				$_SESSION['admumAlert']='0';
				$_SESSION['admumMessage']='';
			} else {
				@mkdir('/admumpln/foto/pegawai');
				$file=$_FILES["file"]["name"];
				if($foto <> 'basic.png'){
					if(file_exists('/admumpln/foto/pegawai/'.$foto)){
						unlink('/admumpln/foto/pegawai/'.$foto);
					}
				}
				try{
					$row = R::findOne('pegawai',"nip=?",[$nip]);
					$row->foto	= $file;
					R::store( $row );
					$id = move_uploaded_file($_FILES["file"]["tmp_name"],"../foto/pegawai/".$file);
					if ($id){
						$_SESSION['admumAlert']='1';
						redirect("/admumpln/profil");
					}
				} catch (Exception $e){
					$_SESSION['admumAlert']='0';
					$_SESSION['admumMessage']=$e->getMessage();
					redirect("/admumpln/profil");
				}
			}
		} else if ($post_submit=='simpan'){
			if ($post_password_lama<>''){
				$count    = R::count('user','password=?',[md5($post_password_lama)]);
				$pengguna = R::count('user','username=?',[$post_username]);
				if ($pengguna < 1){
					if ($count > 0){
						if ($post_password_baru == $post_password_baru_re){
							$row = R::findOne('user',"nip=?",[$nip]);
							$row->username	= $post_username;
							$row->password	= md5($post_password_baru);
							R::store( $row );
							$_SESSION['admumAlert']='1';
							redirect("/admumpln/profil");
						}else{
							$_SESSION['admumAlert']='0';
							$_SESSION['admumMessage']='Password baru tidak cocok';
							redirect("/admumpln/profil");
						}
					}else{
						$_SESSION['admumAlert']='0';
						$_SESSION['admumMessage']='Password anda salah';
						redirect("/admumpln/profil");
					}
				} else{
					$_SESSION['admumAlert']='0';
					$_SESSION['admumMessage']='Username sudah digunakan, silakan input kembali!';
					redirect("/admumpln/profil");
				}
			}else{
				$pengguna = R::count('user','username=?',[$post_username]);
				if ($pengguna < 1){
					$row = R::findOne('user',"nip=?",[$nip]);
					$row->username	= $post_username;
					R::store( $row );
					$_SESSION['admumAlert']='1';
					redirect("/admumpln/profil");
				} else{
					$_SESSION['admumAlert']='0';
					$_SESSION['admumMessage']='Username sudah digunakan, silakan input kembali!';
					redirect("/admumpln/profil");
				}
			}
		}
	}
?>
