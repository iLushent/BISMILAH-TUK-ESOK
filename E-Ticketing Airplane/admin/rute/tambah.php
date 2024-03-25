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
                alert('Yay! data rute berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data rute gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}

$maskapai = query("SELECT * FROM maskapai");
$kota = query("SELECT * FROM kota");


?>

<?php require '../../layouts/sidebar_admin.php'; ?>
<div class="p-6">
    <h1 class="text-2xl font-semibold text-gray-800">Tambah Rute</h1>

<form action="" method="POST">
    <label for="nama_maskapai" class="block text-sm font-medium text-gray-600">Nama Maskapai</label><br />
    <select name="id_maskapai" id="id_maskapai" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
        <?php foreach($maskapai as $data) : ?>
        <option value="<?= $data["id_maskapai"]; ?>"><?= $data["nama_maskapai"]; ?></option>
        <?php endforeach; ?>
    </select><br /> <br />

    <label for="rute_asal" class="block text-sm font-medium text-gray-600">Rute Asal</label><br />
    <select name="rute_asal" id="rute_asal" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
        <?php foreach($kota as $data) : ?>
        <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
        <?php endforeach; ?>
    </select><br /> <br />

   
    <label for="rute_tujuan" class="block text-sm font-medium text-gray-600">Rute Tujuan</label><br />
    <select name="rute_tujuan" id="rute_tujuan"class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
        <?php foreach($kota as $data) : ?>
        <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
        <?php endforeach; ?>
    </select><br /> <br />

    <label for="tanggal_pergi" class="block text-sm font-medium text-gray-600">Tanggal Pergi</label><br />
    <input type="date" name="tanggal_pergi" id="tanggal_pergi" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500"><br /><br />

    <button type="submit" name="tambah"  class="mt-4 mb-2 rounded-lg inline-block text-white text-base py-2 px-4 bg-blue-600">Tambah</button>
</form>
</div>

