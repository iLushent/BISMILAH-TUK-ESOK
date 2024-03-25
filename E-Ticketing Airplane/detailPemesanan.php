<?php require 'layouts/navbar.php'; ?>
<?php 

$id_user = $_SESSION['id_user'];
$ordertiket = mysqli_query($conn, "SELECT * FROM order_tiket 
INNER JOIN order_detail ON order_tiket.id_order = order_detail.id_order
INNER JOIN user ON order_detail.id_user = user.id_user WHERE  user.id_user = '$id_user' GROUP BY order_tiket.id_order");
?>


<div class="list-tiket-pesawat">
    <h1>Detail Pemesanan Penerbangan - E Ticketing</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No Order</th>
            <th>Stok</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>

        <?php foreach  ($ordertiket as $data) : ?>
        <tr>
            <td><?= $data["id_order"]; ?></td>
            <td><?= $data["struk"]; ?></td>
            <td><?= $data["status"]; ?></td>
            <td>
                <a href="detailPemesanan.php?id=<?= $data["id_order"]; ?>">Detail</a>
            </td>
        </tr> 
        <?php endforeach; ?>
    </table>
   
</div>