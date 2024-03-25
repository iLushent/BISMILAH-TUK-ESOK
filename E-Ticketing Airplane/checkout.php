<?php require 'layouts/navbar.php'; ?> 

<div class="list-tiket-pesawat">
    <h1>Checkout Tiket</h1>
    <?php if(empty($_SESSION["cart"])){
        ?>
            <h1>Belum ada tiket yang kamu pesan</h1>
            <?php
    }else{
        ?>
            <div class="wrapper-checkout">
                <h1>Checkout Pemesanan Tiket</h1>
                <div class="checkout">
                    <form action="" method="POSt">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="hidden" name="id_user" value="<?= $_SESSION["id_user"];?>">
                        <input type="text" value="<?= $_SESSION["nama_lengkap"];?>" disabled>
                        <?php $grandtotal = 0; ?>
                        <?php foreach($_SESSION["cart"] as $id_tiket => $kuantitas) : ?>
                        <?php $tiket = query("SELECT * FROM jadwal_penerbangan 
                        INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                        INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id_tiket'")[0]; 
                    
                        $totalHarga = $tiket["harga"] * $kuantitas;
                        $grandtotal += $totalHarga;?>

                        <input type="hidden" name="id_penerbangan" value="<?= $id_tiket; ?>">
                        <input type="hidden" name="jumlah_tiket" value="<?= $kuantitas; ?>">
                        <input type="hidden" name="total_harga" value="<?= $totalHarga; ?>">
                        <?php endforeach; ?>

                        <h1 style="margin-top: 50px;">List tiket pesawat yang dibeli</h1>
                        <?php $grandtotal = 0; ?>
                        <?php foreach($_SESSION["cart"] as $id_tiket => $kuantitas) : ?>
                        <?php $tiket = query("SELECT * FROM jadwal_penerbangan 
                        INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
                        INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id_tiket'")[0]; 
                    
                        $totalHarga = $tiket["harga"] * $kuantitas;
                        $grandtotal += $totalHarga;?>
                        <div class="wrapper-checkout-tiket-pesawat">
                            <div class="card-checkout-tiket-pesawat">
                                <a href="detail.php?id=<?= $tiket["id_jadwal"]; ?>" style="text-decoration: none; color: #000;">
                                <div class="logo-maskapai"><img src="assets/images/<?= $tiket["logo_maskapai"] ; ?>" alt=""></div>
                                <div class="nama-maskapai"><?= $tiket["nama_maskapai"]; ?></div>
                                <div class="tanggal-berangkt"><?= $tiket["tanggal_pergi"]; ?></div>
                                <div class="waktu-berangkat"><?= $tiket["waktu_berangkat"]; ?>-<?= $tiket["waktu_tiba"]; ?></div>
                                <div class="rute-penerbangan"><?= $tiket["rute_asal"]; ?>-<?= $tiket["rute_tujuan"]; ?></div>
                                <div class="text-harga">Rp <?= number_format($tiket["harga"]); ?>@<?= $kuantitas; ?>Tiket</div>
                                <div class="total">Rp <?= number_format($totalHarga); ?></div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <h2>Grand Total <br>
                        Rp. <?= number_format($grandtotal); ?>
                        </h2>
                        <button type="submit" name="checkout">Checkout</button>
                    </form>
                </div>
            </div>
        <?php 
    }
    ?>
</div> 

<?php 
    if (isset($_POST['checkout'])){
        if(checkout($_POST)){
            echo "
            <script type='text/javascript'>
                alert('berhasil dicheckout');
                window.location = 'index.php'
            </script>
            ";
        } else {
            echo mysqli_error($conn);
        }
    }