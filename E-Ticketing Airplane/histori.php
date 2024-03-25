<?php require 'layouts/navbar.php'; ?>
<?php 

$id_user = $_SESSION["id_user"];
$orderTiket = mysqli_query($conn, "SELECT order_tiket.id_order, order_tiket.struk, order_tiket.status, order_detail.id_order, order_detail.id_user, user.id_user FROM order_tiket 
INNER JOIN order_detail ON order_tiket.id_order = order_detail.id_order 
INNER JOIN user ON order_detail.id_user = user.id_user WHERE user.id_user = '$id_user' GROUP BY order_tiket.id_order");
?>


<div class="list-tiket-pesawat">
    <h1>History Pemesanan E-Ticketing</h1>  

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No Order</th>
            <th>Struk</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php foreach($orderTiket as $data) : ?>
        <tr>
            <td><?= $data["id_order"]; ?></td>
            <td><?= $data["struk"]; ?></td>
            <?php 
                if($data["status"] == "proses"){
                    ?>
                    <td style="color: blue; text-decoration: none;"><?= $data["status"]; ?></td>
                    <?php
                } else if($data["status"] == "berhasil"){
                    ?>
                    <td style="color: green; text-decoration: none;"><?= $data["status"]; ?></td>
                    <?php
                } else if($data["status"] == "gagal"){
                    ?>
                    <td style="color: red; text-decoration: none;"><?= $data["status"]; ?></td>
                    <?php
                }
            ?>
            <td>
                <a href="detailHistory.php?id=<?= $data["id_order"]; ?>">Detail</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>