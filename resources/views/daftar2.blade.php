<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" style="background-image: url(images/bg5.png);	background-repeat: no-repeat; background-attachment: fixed; background-position: center; background-size: cover;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Pendaftaran PIKTI</title>

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<div class="row" style="align-content: center; margin-top: 3%; margin-bottom: 5%;">
		<div class="col-sm-6 col-md-offset-6 mx-auto" style="z-index: 1;">
			<!-- {{ Form::open(array('route' => 'daftar.store')) }} -->
			<form id="msform" method="POST" action="{{route('daftar.store')}}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<ul id="progressbar">
					<li class="active">Data Pribadi</li>
					<li>Pendidikan</li>
					<li>Lainnya</li>
				</ul>
			<!-- fieldsets -->
				<fieldset>
					<h2 class="fs-title">Data Pribadi</h2>
					<h3 class="fs-subtitle">Isikan data pribadi Anda secara jelas dan benar</h3>

					<input type="text" name="nomor_pendaftaran" placeholder="Nomor Pendaftaran*"/><br>
					<input type="text" name="nama" placeholder="Nama Lengkap*"/><br>
					
					<input type="text" name="nama_gelar" placeholder="Nama Lengkap dengan gelar*"><br>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="tempat_lahir" placeholder="Tempat Lahir*">
						</div>
						<div class="col-sm-6">
							<input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir*">
						</div>
					</div>
					<input type="text" name="jenis_kelamin" placeholder="Jenis Kelamin*"><br>
					<input type="text" name="agama" placeholder="Agama / Kepercayaan*"><br>
					<input type="text" name="status_perkawinan" placeholder="Status Perkawinan*"><br>

					<!-- <h2 class="fs-title">Alamat</h2> -->
					<h3 class="fs-subtitle">Alamat Asal</h3> 
					<input type="text" name="asal_jalan" placeholder="Jalan*"><br>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="asal_kelurahan" placeholder="Kelurahan*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="asal_kecamatan" placeholder="Kecamatan*">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="asal_kabupaten" placeholder="Kabupaten*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="asal_kode_pos" placeholder="Kode Pos*">
						</div>
					</div>
					<input type="text" name="asal_telepon" placeholder="Telepon*"><br>

					<h3 class="fs-subtitle">Alamat Surabaya</h3> 
					<input type="text" name="surabaya_jalan" placeholder="Jalan*"><br>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="surabaya_kelurahan" placeholder="Kelurahan*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="surabaya_kecamatan" placeholder="Kecamatan*">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="surabaya_kabupaten" placeholder="Kabupaten*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="surabaya_kode_pos" placeholder="Kode Pos*">
						</div>
					</div>
					<input type="text" name="surabaya_telepon" placeholder="Telepon*"><br>
					<input type="text" name="nomor_handphone" placeholder="Nomor Handphone*"><br>

					<input type="button" name="next" class="next action-button" value="Next"/>
				</fieldset>
				<fieldset>
					<h2 class="fs-title">Jenjang Pendidikan</h2>

					<div class="form-group">
						<select class="form-control" name="institusi">
							<option id="sd">SD</option>
							<option id="sltp">SLTP</option>
							<option id="slta">SLTA</option>
							<option id="diploma">Diploma</option>
							<option id="sarjana">Sarjana</option>
							<option id="lainnya">Lain-lain</option>
						</select>
					</div>
					
					<div id="sd_pendidikan">
						<input type="text" name="sd_institusi" placeholder="Nama Institusi*"><br>
						<input type="text" name="sd_bidang_studi" placeholder="Bidang Studi*"><br>
						<div class="row">
							<div class="col-sm-6">
								<input type="number" name="sd_tahun_masuk" min="1850" max="2019" placeholder="Tahun Masuk*">
							</div>
							<div class="col-sm-6">
								<input type="number" name="sd_tahun_lulus" min="1850" max="2019" placeholder="Tahun Lulus*">
							</div>
						</div>
					</div>

					<div id="sltp_pendidikan" style="display: none;">
						<input type="text" name="sltp_institusi" placeholder="Nama Institusi*"><br>
						<input type="text" name="sltp_bidang_studi" placeholder="Bidang Studi*"><br>
						<div class="row">
							<div class="col-sm-6">
								<input type="number" name="sltp_tahun_masuk" min="1850" max="2019" placeholder="Tahun Masuk*">
							</div>
							<div class="col-sm-6">
								<input type="number" name="sltp_tahun_lulus" min="1850" max="2019" placeholder="Tahun Lulus*">
							</div>
						</div>
					</div>

					<div id="slta_pendidikan" style="display: none;">
						<input type="text" name="slta_institusi" placeholder="Nama Institusi*"><br>
						<input type="text" name="slta_bidang_studi" placeholder="Bidang Studi*"><br>
						<div class="row">
							<div class="col-sm-6">
								<input type="number" name="slta_tahun_masuk" min="1850" max="2019" placeholder="Tahun Masuk*">
							</div>
							<div class="col-sm-6">
								<input type="number" name="slta_tahun_lulus" min="1850" max="2019" placeholder="Tahun Lulus*">
							</div>
						</div>
					</div>

					<div id="diploma_pendidikan" style="display: none;">
						<input type="text" name="diploma_institusi" placeholder="Nama Institusi*"><br>
						<input type="text" name="diploma_bidang_studi" placeholder="Bidang Studi*"><br>
						<div class="row">
							<div class="col-sm-6">
								<input type="number" name="diploma_tahun_masuk" min="1850" max="2019" placeholder="Tahun Masuk*">
							</div>
							<div class="col-sm-6">
								<input type="number" name="diploma_tahun_lulus" min="1850" max="2019" placeholder="Tahun Lulus*">
							</div>
						</div>
					</div>

					<div id="sarjana_pendidikan" style="display: none;">
						<input type="text" name="sarjana_institusi" placeholder="Nama Institusi*"><br>
						<input type="text" name="sarjana_bidang_studi" placeholder="Bidang Studi*"><br>
						<div class="row">
							<div class="col-sm-6">
								<input type="number" name="sarjana_tahun_masuk" min="1850" max="2019" placeholder="Tahun Masuk*">
							</div>
							<div class="col-sm-6">
								<input type="number" name="sarjana_tahun_lulus" min="1850" max="2019" placeholder="Tahun Lulus*">
							</div>
						</div>
					</div>

					<div id="lain_pendidikan" style="display: none;">
						<input type="text" name="lainnya_institusi" placeholder="Nama Institusi*"><br>
						<input type="text" name="lainnya_bidang_studi" placeholder="Bidang Studi*"><br>
						<div class="row">
							<div class="col-sm-6">
								<input type="number" name="lainnya_tahun_masuk" min="1850" max="2019" placeholder="Tahun Masuk*">
							</div>
							<div class="col-sm-6">
								<input type="number" name="lainnya_tahun_lulus" min="1850" max="2019" placeholder="Tahun Lulus*">
							</div>
						</div>
					</div>

					<!-- <h3 class="fs-subtitle" style="text-align: left;">SD</h3> 
					<input type="text" name="sd_institusi" placeholder="Nama Institusi*"><br>
					<input type="text" name="sd_bidang_studi" placeholder="Bidang Studi*"><br>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="sd_tahun_masuk" placeholder="Tahun Masuk*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="sd_tahun_lulus" placeholder="Tahun Lulus*">
						</div>
					</div>

					<h3 class="fs-subtitle" style="text-align: left;">SLTP</h3> 
					<input type="text" name="sltp_institusi" placeholder="Nama Institusi*"><br>
					<input type="text" name="sltp_bidang_studi" placeholder="Bidang Studi*"><br>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="sltp_tahun_masuk" placeholder="Tahun Masuk*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="sltp_tahun_lulus" placeholder="Tahun Lulus*">
						</div>
					</div>

					<h3 class="fs-subtitle" style="text-align: left;">SLTA</h3> 
					<input type="text" name="slta_institusi" placeholder="Nama Institusi*"><br>
					<input type="text" name="slta_bidang_studi" placeholder="Bidang Studi*"><br>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="slta_tahun_masuk" placeholder="Tahun Masuk*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="slta_tahun_lulus" placeholder="Tahun Lulus*">
						</div>
					</div>

					<h3 class="fs-subtitle" style="text-align: left;">Diploma</h3> 
					<input type="text" name="diploma_institusi" placeholder="Nama Institusi*"><br>
					<input type="text" name="diploma_bidang_studi" placeholder="Bidang Studi*"><br>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="diploma_tahun_masuk" placeholder="Tahun Masuk*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="diploma_tahun_lulus" placeholder="Tahun Lulus*">
						</div>
					</div>

					<h3 class="fs-subtitle" style="text-align: left;">Sarjana</h3> 
					<input type="text" name="sarjana_institusi" placeholder="Nama Institusi*"><br>
					<input type="text" name="sarjana_bidang_studi" placeholder="Bidang Studi*"><br>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="sarjana_tahun_masuk" placeholder="Tahun Masuk*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="sarjana_tahun_lulus" placeholder="Tahun Lulus*">
						</div>
					</div>

					<h3 class="fs-subtitle" style="text-align: left;">Lain-lain</h3> 
					<input type="text" name="lainnya_institusi" placeholder="Nama Institusi*"><br>
					<input type="text" name="lainnya_bidang_studi" placeholder="Bidang Studi*"><br>
					<div class="row">
						<div class="col-sm-6">
							<input type="text" name="lainnya_tahun_masuk" placeholder="Tahun Masuk*">
						</div>
						<div class="col-sm-6">
							<input type="text" name="lainnya_tahun_lulus" placeholder="Tahun Lulus*">
						</div>
					</div>
 -->
					<input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
					<input type="button" name="next" class="next action-button" value="Next"/>
				</fieldset>
				<fieldset>
					<h2 class="fs-title">Informasi Tambahan</h2>
					<h3 class="fs-subtitle">Status pada saat mendaftar</h3>
					<div class="form-check form-check-inline" style="font-size: 14px;">
						<input class="form-check-input" type="checkbox" id="cb1" name="lulus_sma">
						<label class="form-check-label" for="cb1">Lulus&nbsp;SMA</label>
						<input class="form-check-input" type="checkbox" id="cb2" name="mahasiswa" style="margin-left: 5%;">
						<label class="form-check-label" for="cb2">Mahasiswa</label>
						<input class="form-check-input" type="checkbox" id="cb3" name="bekerja" style="margin-left: 5%;">
						<label class="form-check-label" for="cb3">Bekerja</label>
					</div>
					<br><br>
					<h3 class="fs-subtitle">Mengetahui program ini dari:</h3>
					<div class="form-check form-check-inline" style="font-size: 14px;">
						<input class="form-check-input" type="checkbox" id="cb4" name="koran">
						<label class="form-check-label" for="cb4">Koran</label>
						<input class="form-check-input" type="checkbox" id="cb5" name="spanduk" style="margin-left: 5%;">
						<label class="form-check-label" for="cb5">Spanduk</label>
						<input class="form-check-input" type="checkbox" id="cb6" name="brosur" style="margin-left: 5%;">
						<label class="form-check-label" for="cb6">Brosur</label>
					</div>
					<div class="form-check form-check-inline" style="font-size: 14px;">
						<input class="form-check-input" type="checkbox" id="cb7" name="teman_saudara">
						<label class="form-check-label" for="cb7">Teman&nbsp;/&nbsp;Saudara</label>
						<input class="form-check-input" type="checkbox" id="cb8" name="pameran" style="margin-left: 5%;">
						<label class="form-check-label" for="cb8">Pameran</label>
						<input class="form-check-input" type="checkbox" id="cb9" name="lainnya" style="margin-left: 5%;">
						<label class="form-check-label" for="cb9">Lainnya</label>
					</div>
					<br><br>
					<input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
					<input type="submit" name="submit" class="action-button" value="Submit"/>
				</fieldset>
			</form>
			<!-- {{ Form::close() }} -->
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
	<script type="text/javascript" src="js/sipikti.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
</body>
</html>