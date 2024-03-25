<?php
$page = "Maskapai";

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

$maskapai = query("SELECT * FROM maskapai");

?>

<?php require '../../layouts/sidebar_admin.php'; ?>

<div class="flex-auto overflow-x-hidden bg-blue-100">
            <div class="p-6">
                <div class="">
                    <h1 class="text-2xl font-semibold text-blue-950 mb-4">Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
                </div>
                <div>
                    <a href="tambah.php" class="bg-indigo-500 px-4 py-2 rounded-lg">Tambah Maskapai</a>
                </div>

                <table class="min-w-full border-collapse bg-white border border-gray-300 rounded-lg mt-6">
                    <thead>
                        <tr>
                            <th class="border py-2 px-4 border-b">NO.</th>
                            <th class="border py-2 px-4 border-b">Logo</th>
                            <th class="border py-2 px-4 border-b">Nama Maskapai</th>
                            <th class="border py-2 px-4 border-b">Kapasitas</th> 
                            <th class="border py-2 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $no = 1; ?> 
                    <?php foreach($maskapai as $data) : ?>

                            <tr>
                                <td class="border py-2 px-4 border-b"><?= $no; ?></td>
                                <td class="border py-2 px-4 border-b flex items-center justify-center"><img src="../../assets/images/<?= $data["logo_maskapai"]; ?>" class="w-20" alt="" ></td>
                                <td class="border py-2 px-4 border-b"><?= $data["nama_maskapai"]; ?></td>
                                <td class="border py-2 px-4 border-b"><?= $data["kapasitas"]; ?></td> 
                        
                                <td class="flex  py-2px-2 border-b justify-around items-center">
                                    <a href="edit.php?id=<?= $data["id_maskapai"]; ?>"
                                        class="fa-solid fa-pen-to-square text-md bg-indigo-500 text-white py-2 px-4 hover:text-black rounded-md"></i>Edit</a>
                                    <form action="hapus.php?id=<?= $data["id_maskapai"]; ?>" class=" inline-block" method="post">
                                        <button type="submit"
                                            class="fa-solid fa-trash text-md bg-red-600 py-2 px-4 text-black hover:text-white rounded-md"></i>Hapus</button>
                                    </form>
                                </td>
                            </tr>  
                    </tbody>
                    <?php $no++; ?>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>