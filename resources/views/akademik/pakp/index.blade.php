@extends('layouts.master')

@section('pagetitle')
	Nilai PA - KP
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	<style type="text/css">
		i.material-icons {
			vertical-align: middle;
		}
		#tableMK tr th, td{
			padding: 8px;
		}
	</style>
@endsection

@section('content')
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<h4 class="box-title m-b-0">List Penilaian PA - KP</h4><br>
				<div>
					<table id="list2" class="table table-striped table-hover table-bordered" style="text-align: center; width: 100%;">
						<thead>
							<tr>
								<th style="width: 5%;">No</th>
								<th style="width: 10%;text-align: center;">Tahun</th>
                                <th style="width: 25%;text-align: center;">Kategori</th>
                                <th style="width: 15%;text-align: center;">Jumlah Mahasiswa</th>
								<th style="width: 15%;text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody style="width:100%;">
							<tr style="width:100%;">
								<td></td>
								<td>
									<select class="form-control selectpicker" data-style="btn-info btn-outline" name="penilaian_pa" id="penilaian_pa" required="" onchange="changeLink_pa()">
										<option value="">Pilih Tahun</option>
										@foreach ($data as $thn)
										<option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
										@endforeach
									</select>
								</td>
								<td><b>Proyek Akhir (PA)</b></td>
								<td>{{$jumlah->pa}}</td>
								<td>
									<a href="" id="detil_nilai_pa"><button class="btn btn-info">Detail</button></a>
								</td>
							</tr>
							<tr style="width:100%;">
								<td></td>
								<td>
									<select class="form-control selectpicker" data-style="btn-info btn-outline" name="penilaian_kp" id="penilaian_kp" required="" onchange="changeLink_kp()">
										<option value="">Pilih Tahun</option>
										@foreach ($data as $thn)
										<option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
										@endforeach
									</select>
								</td>
								<td><b>Kerja Praktek (KP)</b></td>
								<td>{{$jumlah->kp}}</td>
								<td>
									<a href="" id="detil_nilai_kp"><button class="btn btn-info">Detail</button></a>
								</td>
							</tr>
							<tr style="width:100%;">
								<td></td>
								<td>
									<select class="form-control selectpicker" data-style="btn-info btn-outline" name="penilaian_kom" id="penilaian_kom" required="" onchange="changeLink_kom()">
										<option value="">Pilih Tahun</option>
										@foreach ($data as $thn)
										<option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
										@endforeach
									</select>
								</td>
								<td><b>Komprehensif</b></td>
								<td>{{$jumlah->kompre}}</td>
								<td>
									<a href="" id="detil_nilai_kom"><button class="btn btn-info">Detail</button></a>
								</td>
							</tr>
							<tr style="width:100%;">
								<td></td>
								<td>
									<select class="form-control selectpicker" data-style="btn-info btn-outline" name="penilaian_pakp" id="penilaian_pakp" required="" onchange="changeLink_pakp()">
										<option value="">Pilih Tahun</option>
										@foreach ($data as $thn)
										<option value="{{$thn->tahun}}">{{$thn->tahun}}</option>
										@endforeach
									</select>
								</td>
								<td><b>Proyek Akhir - Kerja Praktik (PA-KP)</b></td>
								<td>{{$jumlah->pakp}}</td>
								<td>
									<a href="" id="detil_nilai_pakp"><button class="btn btn-info">Detail</button></a>
								</td>
							</tr>
						</tbody>
					</table>
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
		$(document).ready(function() {
			$("#modalSuccess").modal({
				fadeDuration: 100
			});
		});
		$(document).ready(function(){
			var t = $('#list2').DataTable( {
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
		});
		var thn;
		function changeLink_pa(){
			thn = document.getElementById('penilaian_pa').value;

			linknya = "{{route('pakp.detail', ['jenis' => 'pa', 'tahun' => ''])}}" + '/' + thn;
			console.log(linknya);
			document.getElementById('detil_nilai_pa').href = linknya;
		}
		function changeLink_kp(){
			thn = document.getElementById('penilaian_kp').value;

			linknya = "{{route('pakp.detail', ['jenis' => 'kp', 'tahun' => ''])}}" + '/' + thn;
			console.log(linknya);
			document.getElementById('detil_nilai_kp').href = linknya;
		}
		function changeLink_kom(){
			thn = document.getElementById('penilaian_kom').value;

			linknya = "{{route('pakp.detail', ['jenis' => 'kompre', 'tahun' => ''])}}" + '/' + thn;
			console.log(linknya);
			document.getElementById('detil_nilai_kom').href = linknya;
		}
		function changeLink_pakp(){
			thn = document.getElementById('penilaian_pakp').value;

			linknya = "{{route('pakp.detail', ['jenis' => 'pakp', 'tahun' => ''])}}" + '/' + thn;
			console.log(linknya);
			document.getElementById('detil_nilai_pakp').href = linknya;
		}
	</script>
@endsection