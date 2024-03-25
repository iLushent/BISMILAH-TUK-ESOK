<?php

session_start();
require 'functions.php';

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

$id = $_GET["id"];
$jadwal = query("SELECT * FROM jadwal_penerbangan 
INNER JOIN rute ON rute.id_rute = jadwal_penerbangan.id_rute 
INNER JOIN maskapai ON rute.id_maskapai = maskapai.id_maskapai WHERE id_jadwal = '$id'")[0];

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai");


if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data jadwal penerbangan berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data jadwal penerbangan gagal diedit :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>
<div class="p-6">
<h1  class="text-2xl font-semibold text-gray-800">Edit Rute</h1>

<form action="" method="POST">
    <input type="hidden" name="id_jadwal" value="<?= $jadwal["id_jadwal"]; ?>">

    <label for="id_rute" class="block text-sm font-medium text-gray-600">Pilih Rute</label><br />
    <select name="id_rute" id="id_rute"  class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
        <option value="<?= $jadwal["id_rute"]; ?>"><?= $jadwal["nama_maskapai"]; ?> - <?= $jadwal["rute_asal"]; ?> - <?= $jadwal["rute_tujuan"]; ?></option>
        <?php foreach($rute as $data) : ?>
        <option value="<?= $data["id_rute"]; ?>"><?= $data["nama_maskapai"]; ?> - <?= $data["rute_asal"]; ?> - <?= $data["rute_tujuan"]; ?></option>
        <?php endforeach; ?>
    </select><br /> <br />

    <label for="waktu_berangkat" class="block text-sm font-medium text-gray-600">Waktu Berangkat</label><br />
    <input type="time" name="waktu_berangkat" id="waktu_berangkat"  class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" value="<?= $jadwal["waktu_berangkat"]; ?>"><br /><br />

    <label for="waktu_tiba" class="block text-sm font-medium text-gray-600">Waktu Tiba</label><br />
    <input type="time" name="waktu_tiba" id="waktu_tiba"  class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" value="<?= $jadwal["waktu_tiba"]; ?>"><br /><br />

    <label for="harga" class="block text-sm font-medium text-gray-600">Harga</label><br />
    <input type="number" name="harga" id="harga"  class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" value="<?= $jadwal["harga"]; ?>"><br /><br />

    <label for="kapasitas" class="block text-sm font-medium text-gray-600">kapasitas</label><br />
    <input type="number" name="kapasitas" id="kapasitas"  class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" value="<?= $jadwal["kapasitas"]; ?>"><br /><br />

    <button type="submit" name="edit" class="mt-4 mb-2 rounded-lg inline-block text-white text-base py-2 px-4 bg-blue-600">Edit</button>
</form>
</div>

