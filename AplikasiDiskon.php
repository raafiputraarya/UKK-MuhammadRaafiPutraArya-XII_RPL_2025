<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perhitungan Diskon</title>
    <!--Menautkan link bootstrap css-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<!--Memberikan Style pada website-->
<style>
    /*Mengimport font family menggunakan google font */
    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap');

    /*Mengedit halaman body website dengan background gambar dan mmemberi syle font*/
    body{
        /*Memimport gambar dan dijadikan background website*/
        background-image: url(bg1.jpg);
        background-size: cover;
        background-repeat: no-repeat;

        /*mengatur style font dari body website */
        font-family: "Raleway", serif;
        font-optical-sizing: auto;
        font-weight: 500;
        font-style: normal;
        }
    
    /*mengatur style pada class kartu display dan juga mengatur background*/
    .kartu{
        /*mengatur display agar tampilan horizontal */
        display: flex;
        min-height: 40rem;
        justify-content: center;
        align-items: center;
        gap: 10px;

        /*mengatur background style agar terlihat blur */
        background-color: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(100px);

    }
    
    /*mengatur radius pada logo */
    .logo{
        border-radius: 50%;
    }

    /*mengatur background pada form input*/
    .cardinput{
        background-color: rgb(255, 255, 255);
    }
    /*mengatur style font copyright*/
    .copyright{
        font-weight: 400;
        font-style: italic;
        
    }
</style>

<body>
    <!--class container agar tampilan memiliki margin-->
    <div class="container mt-5">
        <!--class kartu untuk membungkus kolom-->
        <div class="kartu row rounded border border-light">
            <!--class kolom logo-->
            <div class="col-md-5 text-center p-2">
                <img src="logo.jpg" class="logo" width="200px" height="200px">
                <h1 class="mt-2" style="font-weight: 700;">Selamat Datang DI </h1>
                <h2>Aplikas coreDiscount</h2>
                <h5 class="text-center" style="font-style: italic;">"Membantu kamu menghitung dengan cepat, mudah, dan akurat"</h5>
            </div>
            <!--class input perhitungan-->
            <div class="cardinput col-md-5 p-2 mt-2 rounded">
                <form class="formulir border border-primary rounded mt-2 p-2" method="post">
                    <label class="form-label">Harga Barang(Rp) :</label>
                    <input type="number" name="harga" class="form-control" min="0" step="0.01" autofocus autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Masukkan Harga barang..." required>
                    
                    <label class="form-label">Diskon Barang(Rp) :</label>
                    <input type="text" maxlength="3" max="100" name="diskon"  class="form-control" min="0" autofocus autocomplete="off" onkeypress="return event.charCode >= 48 && event.charCode <= 57" placeholder="Masukkan diskon barang..." required>

                    <button type="submit" name="hitung" class="btn btn-primary w-100 p-2 mt-2">Hitung</button>
                    <button type="reset" class="btn btn-warning w-100 p-2 mt-2">Ulangi</button>
                </form>

                <!--system perhitungan dengan php-->
                <?php 
                    if(isset($_POST['hitung'])){
                        $harga =  $_POST['harga'];
                        $diskon = $_POST['diskon'];

                        if($harga < 0){
                            echo '<script>alert("HARGA TIDAK BOLEH NEGATIF!")</script>';
                        }elseif($diskon < 0 || $diskon > 100){
                            echo '<script>alert("DISKON HARUS DIANTARA 1-100%!")</script>';
                        }else{
                            $nilai_diskon = $harga * ($diskon/100);
                            $total_diskon = $harga - $nilai_diskon; ?>
                <!--output/hasil dari perhitungan php-->
                <div class="border bg-light border-success rounded mt-2 p-2">
                    <table class="w-100">
                        <tr>
                            <td>Harga barang</td>
                            <td> <b>: Rp<?php echo number_format($harga, 2,',','.') ?></b></td>
                        </tr>
                        <tr>
                            <td>Diskon barang <b><?php echo $diskon ?>%</td>
                            <td><b>: Rp<?php echo number_format($nilai_diskon, 2,',','.')?></b></td>
                        </tr>
                        <tr>
                            <td>Total harga barang seletah diskon</td>
                            <td> <b>: Rp<?php echo number_format($total_diskon, 2,',','.') ?></b></td>
                        </tr>
                    </table>
                </div>
                <!--button untuk menyegarkan website-->
                <div class="bg-light rounded border border-danger mt-2 p-2">
                    <button type="reset" class="btn btn-danger w-100 p-2" onclick="segarkanForm()">Segarkan</button>
                </div>
                <?php
                        }
                    }
                ?>
            </div> 
            <!--copyright title-->
            <p class="copyright text-white text-center" style="font-style:italic; font-size: 13px;">
                     &copy;Copyright CoreTas | Muhammad Raafi Putra Arya | UKK RPL 2025
                </p>
           
        </div>
    </div>

    <!--javascript untuk mereset website-->
    <script>
        function segarkanForm(){
            window.location.href = window.location.href;
        }
    </script>

    <!--script menautkan javascript bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>