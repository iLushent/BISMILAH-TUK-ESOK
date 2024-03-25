<?php require 'layouts/navbar.php'; ?>
<?php

$keyword = '';

if(isset($_GET['cari'])){
    $keyword = $_GET['keyword'];
}

$jadwalPenerbangan = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE nama_maskapai  LIKE '%$keyword%' ORDER BY tanggal_pergi, waktu_berangkat");
?>


<!-- <div class="list-tiket-pesawat">
    <h1 class="text-lg font-semibold">Jadwal Penerbangan - E Ticketing</h1>
    <form action="" method="get" class="">
        <input type="text" name="keyword" placeholder="Cari jadwal penerbangan" class="">
        <button type="submit" name="cari" class="">Search</button>
    </form>
    <div class="wrapper-tiket-pesawat">
        <?php foreach($jadwalPenerbangan as $data) : ?>
            <div class="card-tiket-pesawat">
                <a href="detail.php?id=<?= $data["id_jadwal"]; ?>" style="text-decoration: none; color: #000;">
                    <div class="image"><img src="assets/images/<?= $data["logo_maskapai"]; ?>"  width="80"></div>
                    <div class="nama-maskapai"><?= $data["nama_maskapai"]; ?></div>
                    <div class="tanggal-berangkat"><?= $data["tanggal_pergi"]; ?></div>
                    <div class="waktu-berangkat"><?= $data["waktu_berangkat"]; ?> - <?= $data["waktu_tiba"]; ?></div>
                    <div class="rute-penerbangan"><?= $data["rute_asal"] ?> - <?= $data["rute_tujuan"]; ?></div>
                    <div class="text-harga">Rp <?= number_format($data["harga"]); ?></div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div> -->
!
<div class="list-tiket-pesawat p-4">
    <h1 class="text-lg font-semibold mb-4">Jadwal Penerbangan - E Ticketing</h1>
    <form action="" method="get" class="mb-4">
        <div class="flex">
            <input type="text" name="keyword" placeholder="Cari jadwal penerbangan" class="p-2 border border-gray-300 rounded-l-md focus:outline-none focus:border-blue-500 w-full">
            <button type="submit" name="cari" class="bg-blue-500 text-white px-4 py-2 rounded-r-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Search</button>
        </div>
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        <?php foreach($jadwalPenerbangan as $data) : ?>
            <div class="card-tiket-pesawat bg-blue-100 p-4 rounded-lg">
                <a href="detail.php?id=<?= $data["id_jadwal"]; ?>" style="text-decoration: none; color: #000;">
                    <div class="flex items-center justify-between mb-2">
                        <div class="image"><img src="assets/images/<?= $data["logo_maskapai"]; ?>"  width="80" class="rounded-lg"></div>
                        <div class="nama-maskapai text-xl font-semibold"><?= $data["nama_maskapai"]; ?></div>
                    </div>
                    <div class="text-sm font-semibold"><?= $data["tanggal_pergi"]; ?></div>
                    <div class="text-sm"><?= $data["waktu_berangkat"]; ?> - <?= $data["waktu_tiba"]; ?></div>
                    <div class="text-sm"><?= $data["rute_asal"] ?> - <?= $data["rute_tujuan"]; ?></div>
                    <div class="text-harga text-xl font-semibold mt-2">Rp <?= number_format($data["harga"]); ?></div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>


