<ul class="sidebar-menu">
	<li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/admin/index.php") { ?>  class="active"   <?php   };  ?>><a href="index.php"><i class="fa fa-arrow-right"></i> <span>Dashboard</span></a></li>

 	<li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/admin/rumah.php" || $_SERVER['SCRIPT_NAME']=="/ipl/admin/rumah_tambah.php" || $_SERVER['SCRIPT_NAME']=="/ipl/admin/rumah_edit.php") { ?>  class="active"   <?php   };  ?>><a href="rumah.php"><i class="fa fa-home"></i> <span>Daftar Rumah</span></a></li>

	 <li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/admin/user.php" || $_SERVER['SCRIPT_NAME']=="/ipl/admin/user_tambah.php" || $_SERVER['SCRIPT_NAME']=="/ipl/admin/user_edit.php" || $_SERVER['SCRIPT_NAME']=="/ipl/admin/user_detail.php") { ?>  class="active"   <?php   };  ?>><a href="user.php"><i class="fa fa-user"></i> <span>Daftar User</span></a></li>

	 <li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/admin/tarif.php")  { ?>  class="active"   <?php   };  ?>><a href="tarif.php"><i class="fa fa-money"></i> <span>Ubah Tarif</span></a></li>

	 <li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/admin/tagihan.php" ||  $_SERVER['SCRIPT_NAME']=="/ipl/admin/input_penggunaan.php" || $_SERVER['SCRIPT_NAME']=="/ipl/admin/tagihan_detail.php" || $_SERVER['SCRIPT_NAME']=="/ipl/admin/tagihan_approve.php")   { ?>  class="active"   <?php   }  ?>><a href="tagihan.php"><i class="fa fa-plus"></i> <span>Tagihan</span></a></li>

	 <li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/admin/broadcast.php")  { ?>  class="active"   <?php   };  ?>><a href="broadcast.php"><i class="fa fa-bullhorn"></i> <span>Pesan Siaran</span></a></li>

        <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>