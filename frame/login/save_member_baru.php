<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Go Water</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	</head>
    
	<body>
		 <!-- Modal -->
        <div class="modal fade" id="daftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header text-white" style="background-color:#e206b3;">
                <h5 class="modal-title  text-white" id="exampleModalLabel">Selamat Pendaftaran Anda Berhasil  !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
              Selanjutnya Anda Harus Datang Ke kantor Go Water Untuk Melakukan Konfirmasi dan Mendapatkan account sebagai member Go_water.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" onclick="location.href = 'daftar.php';" data-dismiss="modal">Mengerti</button>
            </div>
            </div>
        </div>
        </div>



		<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!--------------------------------->

	<script src="../js/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="../js/popper.min.js"></script>
    <!-- Bootstrap-4 Beta JS -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="../js/plugins.js"></script>
    <!-- Slick Slider Js-->
    <script src="../js/slick.min.js"></script>
    <!-- Footer Reveal JS -->
    <script src="../js/footer-reveal.min.js"></script>
    <!-- Active JS -->
    <script src="../js/active.js"></script>
    <?php
		session_start();
		include_once  'conection.php';
		//error_reporting(0);		

			if (isset($_POST['submit'])) {
				$nama=$_POST['nama'];
				$paket=$_POST['paket'];
				$nomor=$_POST['nomor'];
				$alamat=$_POST['alamat'];                
                    
                $cek=$dbkonek->query("SELECT right (ID,4) as last FROM customer ORDER BY ID DESC LIMIT 1");

                while ($id=mysqli_fetch_array($cek)) {
                   $tmp_id= $id['last'];
                    
                }
                $tmp_id2=$tmp_id+1;
                $new_id="C00".strval($tmp_id2);
                $status="Belum Verifikasi";
                
				$insert=$dbkonek->query("insert into customer (ID,Nama,Alamat,Telp,paket,Status) values ('$new_id','$nama','$alamat','$nomor','$paket','$status')");
                
				 if ($insert) {
				 		echo "<script type='text/javascript'>
								$(document).ready(function(){
								$('#daftar').modal('show');
								});
								</script>
                			";
				 	}else{
						 
					echo"gagal input";
				 	}


				}		


	?>
	
	</body>
	</html>
	