<?php
$page = "Pengguna";

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

$pengguna = query("SELECT * FROM user WHERE roles = 'Maskapai' || roles = 'Penumpang' ");


?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="flex-auto overflow-x-hidden bg-blue-100">
            <div class="p-6">
                <div class="">
                    <h1 class="text-2xl font-semibold text-blue-950 mb-4">Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
                </div>
                <div>
                    <a href="tambah.php" class="bg-indigo-500 px-4 py-2 rounded-lg">Tambah User</a>
                </div>

                <table class="min-w-full border-collapse bg-white border border-gray-300 rounded-lg mt-6">
                    <thead>
                        <tr>
                            <th class="border py-2 px-4 border-b">NO.</th>
                            <th class="border py-2 px-4 border-b">Username</th>
                            <th class="border py-2 px-4 border-b">Nama Lengkap</th>
                            <th class="border py-2 px-4 border-b">Password</th> 
                            <th class="border py-2 px-4 border-b">Role</th>
                            <th class="border py-2 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $no = 1; ?> 
                    <?php foreach($pengguna as $data) : ?>

                            <tr>
                                <td class="border py-2 px-4 border-b"><?= $no; ?></td>
                                <td class="border py-2 px-4 border-b"><?= $data["username"]; ?></td>
                                <td class="border py-2 px-4 border-b"><?= $data["nama_lengkap"]; ?></td>
                                <td class="border py-2 px-4 border-b"><?= $data["password"]; ?></td> 
                                <td class="border py-2 px-4 border-b"><?= $data["roles"]; ?></td>

                                <td class="flex py-2 px-2 border-b justify-around">
                                    <a href="edit.php?id=<?= $data["id_user"]; ?>"
                                        class="fa-solid fa-pen-to-square text-md bg-indigo-500 text-white py-2 px-4 hover:text-black rounded-md"></i>Edit</a>
                                    <form action="hapus.php?id=<?= $data["id_user"]; ?>" class=" inline-block" method="post">
                                        <button type="submit"
                                            class="fa-solid fa-trash text-md bg-red-600 py-2 px-4 text-black hover:text-white rounded-md"></i>Hapus</button>
                                    </form>
                                </td>
                            </tr>  
                    </tbody>
                    <?php $no++; ?>
                    <?php endforeach; ?>
                </table>