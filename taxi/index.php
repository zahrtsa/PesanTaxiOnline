<?php
	//	Variabel berisi path file data.json yang digunakan untuk menyimpan data anggota.
	$berkas = "dataPesan.json";
	$dataPesan = array();
			//	Mengambil data registrasi dari file JSON
			$pesanJson = file_get_contents($berkas);
			//	Mengubah $dataPesan data registrasi dalam format JSON ke dalam format array PHP.
			$dataPesan = json_decode($pesanJson, true);
	
	//	Kode berikut dieksekusi setelah tombol Daftar ditekan.
		if(isset($_POST['Daftar'])) {
			//Variabel $dataPesan berisi data-data anggota dari form dalam bentuk array.
			//Akan dijalankan kalau data ada isinya.
				$nama = $_POST['nama'];
				$noHP = $_POST['noHP'];
				$jenis = $_POST['jenis'];
				$jarak = $_POST['jarak'];

                function totalTagihan($jarak){ //fungsi untuk menghitung total tagihan
                    if($jarak == 10){ //proses percabangan untuk mengetahui kondisi agar tagihan yang dibayarkan sesuai
                        $total_tagihan = $jarak*1000;
                    }elseif ($jarak >10 ) {
                         $tempuh = $jarak - 10;
                         $total_tagihan = (10*1000)+($tempuh*5000);
                    }elseif($jarak = 0 && $jarak < 10){
                        echo"<script>
						    alert('jarak tempuh minimal 10km!!')
					    </script>";
                    }
                    return $total_tagihan;
                }
                $total_tagihan = number_format(totalTagihan($jarak)); //variable total_tagihan menyimpan data pada fungsi totalTagihan

			//Memasukan data baru kedalam bentuk array
            $dataPesanBaru = array (
                'nama' => $_POST['nama'],
				'noHP' => $_POST['noHP'],
				'jenis' => $_POST['jenis'],
				'jarak' => $_POST['jarak'],
                'total_tagihan' => number_format(totalTagihan($jarak)),
            );

			//	Mengubah data pesan yang berbentuk array PHP menjadi bentuk JSON.
			array_push($dataPesan,$dataPesanBaru);
			$pesanJson = json_encode($dataPesan,JSON_PRETTY_PRINT);
			
			//	Menyimpan data pesan yang berbentuk JSON ke dalam file JSON
			file_put_contents($berkas,$pesanJson);
            header('Location: taxi.php'); //kembali ke halaman pesanan taxi
	    }
?>