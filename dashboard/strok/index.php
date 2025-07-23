<?php 
session_start();
include '../../conf/config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="style.css">
        <title>Receipt example</title>
    </head>
    <body>
        <div class="ticket">
            <img src="../dist/img/AdminLTELogo.png" alt="Logo">
            <p class="centered">RECEIPT EXAMPLE
                <br>Address line 1
                <br>Address line 2</p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Description</th>
                        <th class="price">Rp.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $name = $_SESSION['name'];
                    $gKeranjang = mysqli_query($conn, "SELECT * FROM tb_keranjang WHERE operator = '$name'");
                    while ($a = mysqli_fetch_array($gKeranjang)) {
                    ?>
                    <tr>
                        <td class="quantity"><?=$a['jumlah_item'] ?></td>
                        <td class="description"><?=$a['nama_barang'] ?></td>
                        <td class="price"><?=number_format($a['harga']) ?></td>
                    </tr>
                    <?php };?>
                    <tr style=" border-top: 1px solid black;">
                        <td class="quantity"></td>
                        <td class="description">TOTAL</td>
                        <td class="price"><?=$_SESSION['total_harga']?></td>
                    </tr>
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">BAYAR</td>
                        <td class="price"><?=number_format($_SESSION['Bayar'])?></td>
                    </tr>
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">KEMBALIAN</td>
                        <td class="price"><?=$_SESSION['kembalian']?></td>
                    </tr>
        
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!
        </div>
        <script>
            window.print();
            // window.location = "../index.php?page=tambahtransaksi";
        </script>
    </body>
</html>