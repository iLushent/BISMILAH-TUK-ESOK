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
$pengguna = query("SELECT * FROM user WHERE id_user = '$id'")[0];

if(isset($_POST["edit"])){
    if(edit($_POST) > 0 ){
        echo "
            <script type='text/javascript'>
                alert('Yay! data pengguna berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    }else{
        echo "
            <script type='text/javascript'>
                alert('Yhaa .. data pengguna gagal diedit :(')
                window.location = 'index.php'
            </script>
        ";
    }
}



?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="p-6">
<h1>Edit Petugas</h1>

<form action="" method="POST">
    <input type="hidden" name="id_user" value="<?= $pengguna["id_user"]; ?>">
    <label for="username">Username</label><br />
    <input type="text" name="username" id="username" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" value="<?= $pengguna["username"]; ?>"><br /> <br />

    <label for="nama_lengkap">Nama Lengkap</label><br />
    <input type="text" name="nama_lengkap" id="nama_lengkap" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" value="<?= $pengguna["nama_lengkap"]; ?>"><br /> <br />

    <label for="password">Password</label><br />
    <input type="password" name="password" id="password" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500" value="<?= $pengguna["password"] ?>"><br /> <br />

    <label for="roles" class="block text-sm font-medium text-gray-600">Roles</label><br />
    <select name="roles" id="roles" class="mt-1 p-2 mb-4 border rounded-md w-full focus:outline-none focus:border-blue-500">
        <option value="<?= $pengguna["roles"]; ?>"><?= $pengguna["roles"]; ?></option>
        <option value="Maskapai">Maskapai</option>
        <option value="Penumpang">Penumpang</option>
    </select><br /> <br />

    <button type="submit" name="edit" class="mt-4 mb-2 rounded-lg inline-block text-white text-base py-2 px-4 bg-blue-600">Edit</button>
</form>
</div>
