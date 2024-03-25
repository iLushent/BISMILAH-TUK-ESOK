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

if(isset($_POST["tambah"])){
    if(tambah($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data jadwal penerbangan berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data jadwal penerbangan gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}

$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai");

?>

<?php require '../../layouts/sidebar_admin.php'; ?>
<div class="p-6">
    <h1  class="text-2xl font-semibold text-gray-800">Tambah Jadwal Penerbangan</h1>

<form action="" method="POST">
    <label for="id_rute" class="block text-sm font-medium text-gray-600">Pilih Rute</label><br />
    <select name="id_rute" id="id_rute" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
        <?php foreach($rute as $data) : ?>
        <option value="<?= $data["id_rute"]; ?>"><?= $data["nama_maskapai"]; ?> - <?= $data["rute_asal"]; ?> - <?= $data["rute_tujuan"]; ?></option>
        <?php endforeach; ?>
    </select><br /> <br />

    <label for="waktu_berangkat" class="block text-sm font-medium text-gray-600">Waktu Berangkat</label><br />
    <input type="time" name="waktu_berangkat" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" id="waktu_berangkat"><br /><br />

    <label for="waktu_tiba" class="block text-sm font-medium text-gray-600">Waktu Tiba</label><br />
    <input type="time" name="waktu_tiba" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" id="waktu_tiba"><br /><br />

    <label for="harga" class="block text-sm font-medium text-gray-600">Harga</label><br />
    <input type="number" name="harga" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" id="harga"><br /><br />

    <label for="kapasitas" class="block text-sm font-medium text-gray-600">Kapasitas</label><br />
    <input type="number" name="kapasitas" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" id="kapasitas"><br /><br />

    <button type="submit" name="tambah" class="mt-4 mb-2 rounded-lg inline-block text-white text-base py-2 px-4 bg-blue-600">Tambah</button>
</form>
</div>

