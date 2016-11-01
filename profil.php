<?php
if ($_SESSION['admumNip']=='') {
  $nama  = 'Super Admin';
  $level = 'Master';
}
else{
  $profil 	 = R::getRow("SELECT p.nama, u.username, p.foto, u.level FROM pegawai p, user u WHERE p.nip=u.nip AND p.nip='$admumNip'");
  $nama  = $profil['nama'];
  $level = $profil['level'];
}
?>
<div id="content" class="content">
<!-- begin breadcrumb -->
<ol class="breadcrumb pull-right">
<li><a href="/admumpln/home">Home</a></li>
<li class="active">Profile Page</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Profile Page</h1>
<!-- end page-header -->
<!-- begin profile-container -->
<div class="profile-container">
    <?php
      if (isset($_SESSION['admumAlert'])){
        $admumAlert = $_SESSION['admumAlert'];
        if($admumAlert=='1'){
          echo '<div class="alert alert-success fade in">
              <button type="button" class="close" data-dismiss="alert">
                <span aria-hidden="true">&times;</span>
              </button>
              Success!<br /> Perubahan data berhasil disimpan.
            </div>';
        }else if(($admumAlert=='0')){
          if(isset($_SESSION['admumMessage'])){
            $admumMessage = $_SESSION['admumMessage'];
            if($admumMessage==''){
              echo '<div class="alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">&times;</span>
              </button>
              Gagal!<br /> Data gagal disimpan
              </div>';
            }else{
              echo '<div class="alert alert-danger fade in">
              <button type="button" class="close" data-dismiss="alert">
              <span aria-hidden="true">&times;</span>
              </button>
              Gagal!<br /> Data gagal disimpan : '.$admumMessage.'
              </div>';
            }
          }
        }
      }
    ?>
    <!-- begin profile-section -->
    <div class="profile-section">
        <!-- begin profile-left -->
        <div class="profile-left">
            <!-- begin profile-image -->
            <div class="profile-image">
                <img src="/admumpln/foto/pegawai/<?php echo $image ?>" />
                <i class="fa fa-user hide"></i>
            </div>
            <!-- end profile-image -->
            <div class="m-b-10">
              <a href="#modal-foto" class="btn btn-primary btn-block" data-toggle="modal"><span class="fa fa-camera"></span> Ganti Foto</a>
            </div>
            <!-- begin profile-highlight -->
            <!-- <div class="profile-highlight">
                <h4><i class="fa fa-cog"></i> Only My Contacts</h4>
                <div class="checkbox m-b-5 m-t-0">
                    <label><input type="checkbox" /> Show my timezone</label>
                </div>
                <div class="checkbox m-b-0">
                    <label><input type="checkbox" /> Show i have 14 contacts</label>
                </div>
            </div> -->
            <!-- end profile-highlight -->
        </div>
        <!-- end profile-left -->
        <!-- begin profile-right -->
        <div class="profile-right">
            <!-- begin profile-info -->
            <div class="profile-info">
                <!-- begin table -->
                <div class="table-responsive">
                    <table class="table table-profile">
                        <thead>
                            <tr>
                                <th></th>
                                <th>
                                    <h4><?php echo $nama.'<small> '.$level.'</small>' ?></h4>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                          <form action="/admumpln/data/profil-proses.php" method="POST">
                            <tr class="highlight">
                                <td class="field"><h5>Username</h5></td>
                                <td><input type="text" name="username" class="form-control" value="<?php echo $profil['username'] ?>" /></td>
                            </tr>
                            <tr class="divider">
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><h5 style="color:red">Kosongi password jika tidak ingin mengganti password</h5></td>
                            </tr>
                            <tr>
                                <td class="field"><h5>Password Lama</h5></td>
                                <td><input type="password" name="password_lama" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td class="field"><h5>Password Baru</h5></td>
                                <td><input type="password" name="password_baru" class="form-control" /></td>
                            </tr>
                            <tr>
                                <td class="field"><h5>Re Password Baru</h5></td>
                                <td><input type="password" name="password_baru_re" class="form-control" /></td>
                            </tr>
                            <tr class="divider">
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><button type="submit" name="submit" value="simpan" class="btn btn-lg btn-primary pull-right"><span class="fa fa-save"></span> Simpan</button></td>
                            </tr>
                            <tr class="divider">
                                <td colspan="2"></td>
                            </tr>
                          </form>
                        </tbody>
                    </table>
                </div>
                <!-- end table -->
            </div>
            <!-- end profile-info -->
        </div>
        <!-- end profile-right -->
    </div>
  </div>
</div>
<!-- Upload Foto -->
<div class="modal fade" id="modal-foto">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="/admumpln/data/profil-proses.php" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Upload Foto</h4>
				</div>
				<div class="modal-body">
          <?php if ($_SESSION['admumNip']==''): ?>
            <h4>Tidak dapat mengganti foto user Master</h4>
          <?php else:?>
					<div class="form-group">
						<label class="col-md-3 control-label">Pilih File</label>
						<div class="col-md-9">
							<input type="text" name="foto" value="<?php echo $profil['foto'];?>" hidden />
							<input type="file" name="file" class="form-control"/>
						</div>
					</div>
					<div class="form-group">&nbsp </div>
        <?php endif;?>
				</div>
				<div class="modal-footer">
					<a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal"><span class="fa fa-close"></span> Tutup</a>
					<button type="submit" name="submit" value="foto" class="btn btn-sm btn-success"><span class="fa fa-save"></span> Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php
	if(isset($_SESSION['admumAlert'])) unset($_SESSION['admumAlert']);
	if(isset($_SESSION['admumMessage'])) unset($_SESSION['admumMessage']);
?>
