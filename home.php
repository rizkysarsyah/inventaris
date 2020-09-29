         <section class="welcome p-t-10">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="title-4">Selamat Datang <?php echo $_SESSION['nama_petugas']; ?> ! </h1>
                        <hr>
                    </div>
                </div>
            </div>
        </section>
        <!-- END WELCOME-->

        <!-- STATISTIC-->
        <?php include 'modul/peminjaman/index.php'; ?>
