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
                alert('Yay! data kota berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data kota gagal ditambahkan :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="p-6">
        <h1 class="text-2xl font-semibold text-gray-800">Kota</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            
        <div class="mt-6">
            
            <label for="nama_kota" class="block text-sm font-medium text-gray-600">nama_kota</label>
            <input type="text" id="nama_kota" name="nama_kota" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500 ">

            <button type="submit" name="tambah" class="mt-4 mb-2 rounded-lg inline-block text-white text-base py-2 px-4 bg-blue-600">Tambah Kota</button>

        </div>
        </form>
    </div>
