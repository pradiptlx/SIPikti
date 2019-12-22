@extends('layouts.master')

@section('pagetitle')
	Penilaian PA-KP
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	<style type="text/css">
		i.material-icons {
			vertical-align: middle;
		}
		table tr th, td{
			padding: 8px;
		}
        th {
            text-align: center;
        }
	</style>
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<div style="text-align: left;">
					<h3 class="box-title m-b-0">Detail Penilaian PA-KP</h3>
					<p class="text-muted m-b-30"><i>Proyek Akhir, Kerja Praktek, dan Komprehensif</i></p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kat">Kategori</label>
                            <select class="form-control selectpicker" data-style="btn-info btn-outline" name="kategori" id="kat" onchange="getMhs()">
                                <option value="select">Pilih Kategori Penilaian</option>
                                <option value="pa">Proyek Akhir (PA)</option>
                                <option value="kp">Kerja Praktek (KP)</option>
                                <option value="kompre">Komprehensif</option>
                                <option value="pakp">PA - KP</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="thn">Tahun</label>
                            <select class="form-control selectpicker" data-style="btn-info btn-outline" name="tahun" id="thn">
                                <option value="select">Pilih Tahun</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <p id="labelMhs" style="display: none"><b>Mahasiswa</b></p>
                <div class="row" id="tombol" style="display: none">
                    <div class="col-md-6">
                        <a><button class="btn btn-info">Tambah Mahasiswa</button></a>
                    </div>
                    <div class="col-md-6">
                        <a><button class="btn btn-danger">Download Template Penilaian</button></a>
                        <a><button class="btn btn-warning">Upload Penilaian</button></a>
                        <a><button class="btn btn-primary">Download Hasil</button></a>
                    </div>
                </div><br>
                
				<table style="width:100%;" id="pa">
                    <thead>
                        <tr name="pa" style="display: none">
                            <th style="width: 1%">No.</th>
                            <th style="width: 5%">Kelas</th>
                            <th style="width: 11%">NRP</th>
                            <th style="width: 19%">Nama</th>
                            <th style="width: 28%">Judul PA</th>
                            <th style="width: 27%">Pembimbing PA</th>
                            <th style="width: 9%">Nilai PA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr name="pa" style="display: none">
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;">A</td>
                            <td style="text-align: center;">8839949</td>
                            <td>Rahandi </td>
                            <td>
                                <input class="form-control" name="judul" type="text" placeholder="Contoh: Pengembangan Sistem Informasi">
                            </td>
                            <td>
                                <input class="form-control" name="pembimbing" type="text" placeholder="Contoh: Dini Adni Navastara S.Kom, M.Sc.">
                            </td>
                            <td><input style="text-align: center;" class="form-control" name="nilai_ta" type="text" placeholder="*AB"></td>
                        </tr>
                    </tbody>
                </table>
                <table style="width:100%" id="kp">
                    <thead>
                        <tr name="kp" style="display: none">
                            <th style="width: 1%">No.</th>
                            <th style="width: 5%">Kelas</th>
                            <th style="width: 25%">NRP</th>
                            <th style="width: 40%">Nama</th>
                            <th style="width: 29%">Nilai KP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr name="kp" style="display: none">
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;">A</td>
                            <td style="text-align: center;">8839949</td>
                            <td>Rahandi </td>
                            <td><input style="text-align: center;" class="form-control" name="nilai_kp" type="text" placeholder="Contoh: AB"></td>
                        </tr>
                    </tbody>
                </table>
                <table style="width:100%" id="kompre">
                    <thead>
                        <tr name="kompre" style="display: none">
                            <th style="width: 1%">No.</th>
                            <th style="width: 5%">Kelas</th>
                            <th style="width: 25%">NRP</th>
                            <th style="width: 40%">Nama</th>
                            <th style="width: 29%">Nilai Komprehensif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr name="kompre" style="display: none">
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;">A</td>
                            <td style="text-align: center;">8839949</td>
                            <td>Rahandi </td>
                            <td><input style="text-align: center;" class="form-control" name="nilai_kp" type="text" placeholder="Contoh: AB"></td>
                        </tr>
                    </tbody>
                </table>
                <table style="width:100%" id="pakp">
                    <thead>
                        <tr name="pakp" style="display: none">
                            <th style="width: 1%">No.</th>
                            <th style="width: 5%">Kelas</th>
                            <th style="width: 11%">NRP</th>
                            <th style="width: 19%">Nama</th>
                            <th style="width: 25%">Judul PA</th>
                            <th style="width: 25%">Pembimbing PA</th>
                            <th style="width: 7%">Nilai PA</th>
                            <th style="width: 7%">Nilai KP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr name="pakp" style="display: none">
                            <td style="text-align: center;"></td>
                            <td style="text-align: center;">A</td>
                            <td style="text-align: center;">8839949</td>
                            <td>Rahandi </td>
                            <td>
                                <input class="form-control" name="judul" type="text" placeholder="Contoh: Pengembangan Sistem Informasi">
                            </td>
                            <td>
                                <input class="form-control" name="pembimbing" type="text" placeholder="Contoh: Dini Adni Navastara S.Kom, M.Sc.">
                            </td>
                            <td><input style="text-align: center;" class="form-control" name="nilai_ta" type="text" placeholder="*AB"></td>
                            <td><input style="text-align: center;" class="form-control" name="nilai_kp" type="text" placeholder="*AB"></td>
                        </tr>
                    </tbody>
                </table>
                <div style="text-align: center; display: none" id="save">
                    <a><button type="submit" class="btn btn-success">Simpan</button></a>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{ URL::asset('js/sipikti.js') }}"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('js/bootstrap.js') }}">
	<script>
        function getMhs(){
            var kat = $('#kat').val();
            console.log("change!");
            console.log(kat);
            listKat = ['pa','kp','kompre','pakp'];
            
            document.getElementById('labelMhs').style.display = '';
            document.getElementById('tombol').style.display = '';
            document.getElementById('save').style.display = '';
            
            for (i=0; i<listKat.length; i++){
                if (kat == listKat[i]){
                    console.log(kat);
                    for (j=0; j<listKat.length; j++){
                        var nameGroup = document.getElementsByName(listKat[j]);
                        for(k=0; k<nameGroup.length; k++){
                            nameGroup[k].style.display = 'none';
                        }
                        // hide datatable
                        $('#' + listKat[j] + '_wrapper').remove();
                    }
                    var nameGroup = document.getElementsByName(listKat[i]);
                    for (m=0; m<nameGroup.length; m++){
                        nameGroup[m].style.display = '';
                    }
                    // show datatable
                    var t = $('#' + listKat[i]).DataTable( {
                        "columnDefs": [ {
                            "searchable": false,
                            "orderable": false,
                            "targets": 0,
                        } ],
                        "order": [[ 1, 'asc' ]],
                    } );

                    t.on( 'order.dt search.dt', function () {
                        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        } );
                    } ).draw();
                    break;
                }
            }
        };
	</script>
@endsection