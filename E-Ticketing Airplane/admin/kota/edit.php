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
$kota = query("SELECT * FROM kota WHERE id_kota = '$id'")[0];

if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data kota berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data kota gagal diedit :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

 <div class="p-6">
        <h1 class="text-2xl font-semibold text-gray-800">Edit Kota</h1>
        <form action="" method="post" enctype="multipart/form-data">
            
        <div class="mt-6">

            <input type="hidden" name="id_kota" value="<?= $kota["id_kota"]; ?>">
            
            <label for="nama_kota" class="block text-sm font-medium text-gray-600">Nama Kota</label>
            <input type="text" id="nama_kota" name="nama_kota" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500 " value="<?= $kota["nama_kota"]; ?>">

            <button type="submit" name="edit" class="mt-4 mb-2 rounded-lg inline-block text-white text-base py-2 px-4 bg-blue-600">Edit Kota</button>

        </div>
        </form>
    </div>
