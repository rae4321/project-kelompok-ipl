<ul class="sidebar-menu">
        <li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/index.php") { ?>  class="active"   <?php   };  ?>><a href="index.php"><i class="fa fa-arrow-right"></i> <span> Dashboard</span></a></li>
        <li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/riwayat.php" || $_SERVER['SCRIPT_NAME']=="/ipl/tagihan_detail.php" || $_SERVER['SCRIPT_NAME']=="/ipl/bayar.php" ) { ?>  class="active"   <?php   };  ?>><a href="riwayat.php"><i class="fa fa-history"></i> <span>Riwayat Pembayaran</span></a></li>
        <li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/profil.php") { ?>  class="active"   <?php   };  ?>><a href="profil.php"><i class="fa fa-user"></i> <span>Info Profil</span></a></li>
        <li <?php if($_SERVER['SCRIPT_NAME']=="/ipl/kotakmasuk.php") { ?>  class="active"   <?php   };  ?>><a href="kotakmasuk.php"><i class="fa fa-inbox"></i> <span>Pesan Masuk</span>
            <span class="pull-right-container">
              <span class="label label-danger pull-right">
                <?php
                  $resInbox = mysqli_query($conn, "SELECT * FROM pesan WHERE user_id='$adminId' AND status='0'");
                  $jumlahInbox = mysqli_num_rows($resInbox);
                  echo $jumlahInbox;
                ?>
              </span>
            </span></a></li>
        <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
      </ul>