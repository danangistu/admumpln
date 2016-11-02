<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
	<!-- begin sidebar scrollbar -->
	<div data-scrollbar="true" data-height="100%">
		<!-- begin sidebar user -->
		<ul class="nav">
			<li class="nav-profile">
				<div class="image">
					<a href="javascript:;"><img src="/admumpln/foto/pegawai/<?php echo $image ?>" alt="" /></a>
				</div>
				<div class="info">
					<?php echo $admumUName; ?>
					<small>ADMUM PLN</small>
				</div>
			</li>
		</ul>
		<!-- end sidebar user -->
		<!-- begin sidebar nav -->
		<ul class="nav">
			<li class="nav-header">Navigation</li>
			<?php
				$rolemenu = explode(',',$_SESSION['admumRole']);
			?>
			<?php if (in_array('a', $rolemenu)) : ?>
				<li <?php if ($page=="home") echo "class='active'"; ?>>
					<a href="/admumpln/home">
						<i class="fa fa-laptop"></i>
						<span>Dashboard</span>
					</a>
				</li>
			<?php endif; ?>
			<?php if (in_array('b', $rolemenu)) : ?>
				<li class="has-sub <?php if ($page=="pegawai" or $page=="pensiun") echo "active"; ?>">
					<a href="javascript:;">
						<b class="caret pull-right"></b>
						<i class="fa fa-users"></i>
						<span>Pegawai</span>
					</a>
					<ul class="sub-menu">
						<li <?php if ($page=="pegawai" and ($sub=="" or $sub=="tambah" or $sub=="edit" or $sub=="detail")) echo "class='active'"; ?>><a href="/admumpln/pegawai"><span class="fa fa-users"></span> Data Pegawai</a></li>
						<li <?php if ($page=="pegawai" and $sub=="report") echo "class='active'"; ?>><a href="/admumpln/pegawai/report"><span class="fa fa-clipboard"></span> Report Data Pegawai</a></li>
						<li <?php if ($page=="pensiun") echo "class='active'"; ?>><a href="/admumpln/pensiun"><span class="fa fa-users"></span> Pensiun Tahun Ini</a></li>
					</ul>
				</li>
			<?php endif; ?>
			<?php if (in_array('c', $rolemenu)) : ?>
				<li class="has-sub <?php if ($page=="diklat") echo "active"; ?>">
					<a href="javascript:;">
						<b class="caret pull-right"></b>
						<i class="fa fa-briefcase"></i>
						<span>Diklat</span>
					</a>
					<ul class="sub-menu">
						<li <?php if ($page=="diklat" and ($sub=="" or $sub=="tambah")) echo "class='active'"; ?>><a href="/admumpln/diklat"><span class="fa fa-briefcase"></span> Diklat Pegawai</a></li>
						<li <?php if ($page=="diklat" and $sub=="data") echo "class='active'"; ?>><a href="/admumpln/diklat/data"><span class="fa fa-book"></span> Data Diklat</a></li>
						<li <?php if ($page=="diklat" and $sub=="report") echo "class='active'"; ?>><a href="/admumpln/diklat/report"><span class="fa fa-clipboard"></span> Report Diklat</a></li>
					</ul>
				</li>
			<?php endif; ?>
			<?php if (in_array('d', $rolemenu)) : ?>
				<li class="has-sub <?php if ($page=="talenta") echo "active"; ?>">
					<a href="javascript:;">
						<b class="caret pull-right"></b>
						<i class="fa fa-star"></i>
						<span>Talenta</span>
					</a>
					<ul class="sub-menu">
						<li <?php if ($page=="talenta" and ($sub=="" or $sub=="tambah")) echo "class='active'"; ?>><a href="/admumpln/talenta"><span class="fa fa-briefcase"></span> Talenta Pegawai</a></li>
						<li <?php if ($page=="talenta" and $sub=="grafik") echo "class='active'"; ?>><a href="/admumpln/talenta/grafik"><span class="fa fa-book"></span> Grafik Talenta</a></li>
					</ul>
				</li>
			<?php endif; ?>
			<?php if (in_array('e', $rolemenu)) : ?>
				<li class="has-sub <?php if ($page=="keluarga") echo "active"; ?>">
					<a href="javascript:;">
						<b class="caret pull-right"></b>
						<i class="fa fa-heart"></i>
						<span>Keluarga</span>
					</a>
					<ul class="sub-menu">
						<li <?php if ($page=="keluarga" and ($sub=="" or $sub=="tambah" or $sub=="edit")) echo "class='active'"; ?>><a href="/admumpln/keluarga"><span class="fa fa-briefcase"></span> Keluarga Pegawai</a></li>
						<li <?php if ($page=="keluarga" and $sub=="pensiun") echo "class='active'"; ?>><a href="/admumpln/keluarga/pensiun"><span class="fa fa-book"></span> Keluarga Pensiun</a></li>
						<li <?php if ($page=="keluarga" and $sub=="anak") echo "class='active'"; ?>><a href="/admumpln/keluarga/anak"><span class="fa fa-book"></span> Keluarga Anak 21</a></li>
					</ul>
				</li>
			<?php endif; ?>
			<?php if (in_array('f', $rolemenu)) : ?>
				<li <?php if ($page=="pendidikan") echo "class='active'"; ?>>
					<a href="/admumpln/pendidikan">
						<i class="fa fa-mortar-board"></i>
						<span>Pendidikan</span>
					</a>
				</li>
			<?php endif; ?>
			<?php if (in_array('g', $rolemenu)) : ?>
				<li class="has-sub <?php if ($page=="pkl") echo "active"; ?>">
					<a href="/admumpln/pkl">
						<i class="fa fa-university"></i>
						<span>PKL</span>
					</a>
				</li>
			<?php endif; ?>
			<?php if (in_array('h', $rolemenu)) : ?>
				<li class="has-sub <?php if ($page=="keamanan" or $page=="satpam") echo "active"; ?>">
					<a href="javascript:;">
						<b class="caret pull-right"></b>
						<i class="fa fa-lock"></i>
						<span>Keamanan</span>
					</a>
					<ul class="sub-menu">
						<li <?php if ($page=="satpam" and ($sub=="" or $sub=="tambah" or $sub=="edit")) echo "class='active'"; ?>><a href="/admumpln/satpam"><span class="fa fa-users"></span> Personil Satpam</a></li>
						<li <?php if ($page=="keamanan" and $sub=="attribut") echo "class='active'"; ?>><a href="/admumpln/keamanan/atribut"><span class="fa fa-shield"></span> Atribut Satpam</a></li>
						<li <?php if ($page=="keamanan" and $sub=="pos") echo "class='active'"; ?>><a href="/admumpln/keamanan/pos"><span class="fa fa-institution alias"></span> Peralatan di Pos</a></li>
						<li <?php if ($page=="keamanan" and $sub=="report") echo "class='active'"; ?>><a href="/admumpln/keamanan/report"><span class="fa fa-clipboard"></span> Report</a></li>
					</ul>
				</li>
			<?php endif; ?>
			<?php if (in_array('i', $rolemenu)) : ?>
				<li class="<?php if ($page=="user") echo "active"; ?>">
					<a href="/admumpln/user">
						<i class="glyphicon glyphicon-user"></i>
						<span>Management Users</span>
					</a>
				</li>
			<?php endif; ?>
			<?php if (in_array('j', $rolemenu)) : ?>
				<li>
					<a href="/admumcsr/" target='_blank'>
						<i class="glyphicon glyphicon-dashboard"></i>
						<span>Admum CSR</span>
					</a>
				</li>
			<?php endif; ?>
			<?php if (in_array('k', $rolemenu)) : ?>
				<li class="<?php if ($page=="datadiri") echo "active"; ?>">
					<a href="/admumpln/datadiri">
						<i class="glyphicon glyphicon-user"></i>
						<span>Data Diri</span>
					</a>
				</li>
			<?php endif; ?>

			<!-- begin sidebar minify button -->
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
			<!-- end sidebar minify button -->
		</ul>
		<!-- end sidebar nav -->
	</div>
	<!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->
