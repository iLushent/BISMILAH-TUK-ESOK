<?php
require 'functions.php';
$id = $_GET["id"];

$query = mysqli_query($conn, "UPDATE order_tiket SET status = 'gagal' WHERE id_order = '$id'");
if($query){
    echo "
        <script type='text/javascript'>
            alert('Data telah diverivikasi');
            window.location = 'index.php';
        </script>
    ";
}
?>