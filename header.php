<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <div class=""> 

                </div>
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo $_SESSION['nama_petugas']; ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo $_SESSION['nama_petugas']; ?></a>
                                        </h5>
                                        <span class="nuumber">
                                            <?php 
                                            $id_level = $_SESSION['id_level'];
                                            $query = mysqli_query($mysqli, "SELECT * FROM level where ID_LEVEL = $id_level");
                                            $data=mysqli_fetch_assoc($query);
                                            echo $data['NAMA_LEVEL'];
                                            ?>

                                        </span>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="index.html">
                        <img src="images/icon/logo.png" alt="CoolAdmin" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <a href="index.php?page=peminjaman">Peminjaman</a>
                    </li>
                    <li>
                        <a href="index.php?page=inventaris">Inventaris</a>
                    </li>
                    <li>
                        <a href="index.php?page=ruang">Ruang</a>
                    </li>
                    <li>
                        <a href="index.php?page=petugas">Petugas</a>
                    </li>
                    <li>
                        <a href="index.php?page=pegawai">Pegawai</a>
                    </li>
                    <li>
                        <a href="index.php?page=jenis">Jenis</a>
                    </li>
                    <li>
                        <a href="index.php?page=level">Level</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>