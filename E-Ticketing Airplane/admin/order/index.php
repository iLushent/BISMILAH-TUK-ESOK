<?php

$page = "Pemesanan Tiket";

require 'functions.php';
session_start();

if(!isset($_SESSION["username"])){
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../auth/login/index.php';
    </script>
    ";
}

$orderTiket = query("SELECT * FROM order_tiket")

?>

<?php require '../../layouts/sidebar_admin.php'; ?>


<div class="flex-auto overflow-x-hidden bg-blue-100">
    <div class="p-6">
    <div class="">
             <h1 class="text-2xl font-semibold text-blue-950 mb-4">Halo, <?= $_SESSION["nama_lengkap"]; ?></h1>
        </div>
        <table class="min-w-full border-collapse bg-white border border-gray-300 rounded-lg mt-6">
        <thead>
                    <tr>
                        <th class="border py-2 px-4 border-b">Nomor Order.</th>
                        <th class="border py-2 px-4 border-b">Struk</th>
                        <th class="border py-2 px-4 border-b">Status</th>
                        <th class="border py-2 px-4 border-b">Opsi</th>
                    </tr>
        </thead>

        <tbody>

            <?php foreach($orderTiket as $data) : ?>
        <tr>
            <td class="border py-2 px-4 border-b"><?= $data["id_order"]; ?></td>
            <td class="border py-2 px-4 border-b"><?= $data["struk"]; ?></td>
            <td class="border py-2 px-4 border-b">

            <?php 
                if($data["status"] == "proses"){
                    ?>
                    <a href="update_status.php?id=<?= $data["id_order"]; ?>" class="text-gray-700 bg-gray-200 py-2 px-4 rounded-md">Proses</a>
                    <?php
                } else if($data["status"] == "berhasil"){
                    ?>
                    <a href="" class="text-green-700 bg-green-200 py-2 px-4 rounded-md">Berhasil</a>
                    <?php
                } else if($data["status"] == "gagal"){
                    ?>
                    <a href="" class="text-red-700 bg-red-200 py-2 px-6 rounded-md">Gagal</a>
                    <?php
                }
            ?>
            </td>

            <td class="border py-2 px-4 border-b flex justify-center">
                <?php if ($data["status"] == "proses"){
                    ?>
                    <button class="btn btn-primary"><a href="verif.php?id=<?= $data["id_order"]; ?>">Verifikasi</a></button>
                    <a href="reject.php?id=<?= $data["id_order"]; ?>">Reject</a>
                <?php }else if($data["status"] == "berhasil" || $data["status"] == "gagal"){
                    ?>
                    <a href="hapus.php?id=<?= $data["id_order"]; ?>" class="fa-solid fa-trash text-md bg-red-600 py-2 px-4 text-black hover:text-white rounded-md">Hapus</a>
                <?php    
                } ?>
            </td>

        </tr>
    <?php endforeach; ?>
        </tbody>
        </table>
    </div>
</div>
    