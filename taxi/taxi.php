<?php
    //	Variabel $jenis berisi data jenis kategori anggota dalam bentuk array.
    $jenis = ['Avanza','Rush','Alphard','Inova','Fortuner'];

    // //	Mengurutkan array $jenis sesuai abjad A-Z.
    sort($jenis); //fungsi sort bawaan PHP untuk mengurutkan menaik
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css" />
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <title>Pesan Taxi Online</title>
  </head>
  <body>
    <div class="container">
      <div class="card px-4 py-4 border-0 h-100">
        <div class="card-header" style="background-color:white">
          <div class="d-flex align-items-center">
            <img
              class="img-fluid"
              width="10%"
              height="10%"
              src="../assets/img/logomobil.png"
              alt="Image"
            />
            <p class="fw-semibold fs-1 align-items-center p-4"> Aplikasi Pemesanan Taxi Online</p>
          </div>
        </div>
        <div class="card-body">
          <div class="container">
            <div class="row g-3">
              <div class="col-4">
              <!-- FormInput Data -->
              <form action="index.php" method="post" id="formRegis">
                <p class="fw-semibold fs-5">Pesan Taxi Online</p>
                <div class="mb-3 row">
                  <div class="col-sm-4 col-form-label">
                    <label for="nama">Nama:</label>
                  </div>
                  <div class="col-sm-6">
                    <input
                      class="form-control"
                      type="text"
                      id="nama"
                      name="nama"
                    />
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-4 col-form-label">
                    <label for="nomor">Nomor HP:</label>
                  </div>
                  <div class="col-sm-6">
                    <div class="input-group">
                      <span class="input-group-text">+62</span>
                      <input
                        class="form-control"
                        type="number"
                        id="noHP"
                        name="noHP"
                        maxlength="16"
                      />
                    </div>
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-4 col-form-label">
                    <label for="jenis">Jenis Mobil:</label>
                  </div>
                  <div class="col-sm-6">
                    <select id="jenis" name="jenis" class="form-control form-select">
                      <option value="">Pilih Mobil</option>
                      <?php
                        //Menampilkan dropdown pilihan jenis mobil (Avanza,Rush,Alphard,Inova,Fortuner).
                        for($a=0;$a<sizeof($jenis);$a++){
                          echo ("<option value=$jenis[$a].<br>".$jenis[$a]); } ?>
                    </select>
                  </div>
                </div>
                <div class="mb-3 row">
                  <div class="col-sm-4 col-form-label"><label for="jarak">Jarak (km):</label></div>
                  <div class="col-sm-6">
                    <input
                      min="10"
                      class="form-control"
                      type="text"
                      id="jarak"
                      name="jarak"
                    />
                  </div>
                </div>
                <div class="row">
                  <!-- Tombol Submit -->
                  <div class="col-sm-4"><button class="btn btn-primary" type="submit" form="formRegis" value="Pesan" name="Daftar">Jemput Sekarang!!</button></div>
                  <div class="col-sm-6"></div>		
                </div>
              </form>
              <!-- End Input Data -->
            </div>
            <!-- Start Tabel Data -->
            <div class="col-8">
              <p class="fw-semibold fs-5">Data Pesanan Taxi Online</p>
              <table class="table table-bordered mt-4">
                <tr>
                  <th>Nama Pemesan:</th>
                  <th>Nomor HP:</th>
                  <th>Jenis Mobil:</th>
                  <th>Jarak Tempuh:</th>
                  <th>Tagihan:</th>
                </tr>

              <?php
                  include 'index.php';
                  for($i=0;$i<sizeof($dataPesan);$i++){
                    $nama = $dataPesan[$i]['nama'];
                    $noHP = $dataPesan[$i]['noHP'];
                    $jenis = $dataPesan[$i]['jenis'];
                    $jarak = $dataPesan[$i]['jarak'];
                    $total_tagihan = $dataPesan[$i]['total_tagihan'];
                //	Menampilkan data pesanan taxi.
                echo "<tr>
                  <td>$nama</td>
                  <td>$noHP</td>
                  <td>$jenis</td>
                  <td>$jarak</td>
                  <td>Rp $total_tagihan ,-</td>
                  </tr>";
                  }
                ?>
              </table>
            </div>
            <!-- End Tabel Data -->
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
