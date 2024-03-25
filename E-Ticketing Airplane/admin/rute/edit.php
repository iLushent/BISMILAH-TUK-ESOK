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
$rute = query("SELECT * FROM rute INNER JOIN maskapai ON maskapai.id_maskapai = rute.id_maskapai WHERE id_rute = '$id'")[0];

$maskapai = query("SELECT * FROM maskapai");
$kota = query("SELECT * FROM kota");


if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data rute berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data rute gagal diedit :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

 <div class="p-6">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Rute</h1>
        <form action="" method="POST" enctype="multipart/form-data">         
        <div class="mt-6">
            <input type="hidden" name="id_rute" value="<?= $rute["id_rute"]; ?>">
            
            <label for="id_maskapai" class="block text-sm font-medium text-gray-600">Nama Maskapai</label>
            <select id="id_maskapai" name="id_maskapai" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
                <?Php foreach ($maskapai as $namaMaskapai) : ?>
                    <option value="<?= $namaMaskapai["id_maskapai"]; ?>"><?= $namaMaskapai["nama_maskapai"]; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="rute_asal" class="block text-sm font-medium text-gray-600">Rute Asal</label>
            <select id="rute_asal" name="rute_asal" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
                <?Php foreach ($kota as $data) : ?>
                    <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
                <?php endforeach; ?>
            </select>
                    
            <label for="rute_tujuan" class="block text-sm font-medium text-gray-600">Rute Tujuan</label>
            <select id="rute_tujuan" name="rute_tujuan" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
                <?Php foreach ($kota as $data) : ?>
                    <option value="<?= $data["nama_kota"]; ?>"><?= $data["nama_kota"]; ?></option>
                <?php endforeach; ?>
            </select>
            
            <label for="tanggal_pergi" class="block text-sm font-medium text-gray-600">tanggal_pergi</label>
            <input type="date" id="tanggal_pergi" name="tanggal_pergi" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">

            <button type="submit" name="edit" class="mt-4 mb-2 rounded-lg inline-block text-white text-base py-2 px-4 bg-blue-600">Edit</button>

        </div>
        </form>
</div>