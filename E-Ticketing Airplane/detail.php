<?php require 'layouts/navbar.php'; ?>
<?php 

$id = $_GET["id"];
$jadwalPenerbangan = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id'")[0];
?>


<!-- <div class="list-tiket-pesawat">
    <h1 class="text-2xl font-semibold">Jadwal Penerbangan - E Ticketing</h1>
    <div class="wrapper-detail-tiket-pesawat">
        <div class="img">
            <div class="logo-maskapai"><img src="assets/images/<?= $jadwalPenerbangan["logo_maskapai"] ; ?>" alt=""></div>
        </div>
        <div class="konten">
        <div class="nama-maskapai">Nama Maskapai : <?= $jadwalPenerbangan["nama_maskapai"] ; ?></div>
        <div class="rute-asal">Rute Aasal : <?= $jadwalPenerbangan["rute_asal"] ; ?></div>
        <div class="rute-tujuan">Rute Tujuan : <?= $jadwalPenerbangan["rute_tujuan"] ; ?></div>
        <div class="tanggal-berangkat">Tanggal Berangkat : <?= $jadwalPenerbangan["tanggal_pergi"] ; ?></div>
        <div class="waktu-berangkat">Waktu Berangkat : <?= $jadwalPenerbangan["waktu_berangkat"] ; ?></div>
        <div class="waktu-tiba">Waktu Tiba : <?= $jadwalPenerbangan["waktu_tiba"] ; ?></div>
        <div class="harga-tiket">Harga : Rp <?= number_format($jadwalPenerbangan["harga"]) ; ?></div>
        <div class="kapasitas">Kapasitas : <?= $jadwalPenerbangan["kapasitas_kursi"] ; ?></div>

        <form action="" method="POST">
            <input type="number" name="qty" value="1">
            <button type="submit" name="pesan">Pesan</button>
        </form>
        </div>
        
    </div>
</div> -->


<div class="container mx-auto px-4 mt-8">
    <div class="flex flex-col md:flex-row items-center md:items-start border rounded-lg shadow-lg bg-white">
        <div class="">
            <div class="p-6">
                <img class="mx-auto" src="assets/images/<?= $jadwalPenerbangan["logo_maskapai"] ; ?>" alt="Maskapai Logo">
            </div>
        </div>
        <div class="md:w-2/3 p-6">
            <div class="text-lg mb-4">Nama Maskapai: <?= $jadwalPenerbangan["nama_maskapai"] ; ?></div>
            <div class="mb-2">Rute Asal: <?= $jadwalPenerbangan["rute_asal"] ; ?></div>
            <div class="mb-2">Rute Tujuan: <?= $jadwalPenerbangan["rute_tujuan"] ; ?></div>
            <div class="mb-2">Tanggal Berangkat: <?= $jadwalPenerbangan["tanggal_pergi"] ; ?></div>
            <div class="mb-2">Waktu Berangkat: <?= $jadwalPenerbangan["waktu_berangkat"] ; ?></div>
            <div class="mb-2">Waktu Tiba: <?= $jadwalPenerbangan["waktu_tiba"] ; ?></div>
            <div class="mb-2">Harga: Rp <?= number_format($jadwalPenerbangan["harga"]) ; ?></div>
            <div class="mb-4">Kapasitas: <?= $jadwalPenerbangan["kapasitas_kursi"] ; ?></div>

            <form action="" method="POST">
                <div class="flex items-center mb-4">
                    <label for="qty" class="mr-2">Jumlah Tiket:</label>
                    <input type="number" id="qty" name="qty" value="1" class="border rounded-md px-2 py-1 w-16">
                </div>
                <button type="submit" name="pesan" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-md">Pesan</button>
            </form>
        </div>
    </div>
</div>
<?php 

if(isset($_POST["pesan"])){
    if($_POST["qty"] > $jadwalPenerbangan["kapasitas_kursi"]){
        echo "
            <script type='text/javascript'>
            alert('Mohon maaf kuantitas yang kamu pesna melibihi kuantitas yang tersedia')
            window.location = 'index.php'
            </script>
        ";
    }else if($_POST["qty"] <= 0){
        echo "
            <script type='text/javascript'>
            alert('Beli setidaknya 1 tiket ya!')
            window.location = 'index.php'
            </script>
        ";
    }else{
        $qty = $_POST["qty"];
        $_SESSION["cart"][$id] = $qty;
        echo "
            <script type='text/javascript'>
            window.location = 'cart.php'
            </script>
        ";
    }
}

?>