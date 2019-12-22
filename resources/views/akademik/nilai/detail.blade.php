@extends('layouts.master')

@section('pagetitle')
	Detail Penilaian
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
			text-align: center;
		}
	</style>
@endsection

@section('content')
	@if (session('status'))
	<div id="modalSuccess" class="modal fade" role="dialog" style="z-index: 9999; width:100%;">
		<div class="modal-dialog" style="width: 75%;">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title" style="text-align: center"><b>{{session('status')}}</b></h4>
				</div>
			</div>
		</div>
	</div>
	@endif
	<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<div style="text-align: left;">
					<h3 class="box-title m-b-0">{{$info->matkul}}</h3>
					<p class="text-muted m-b-30">{{$info->tahun}} - Semester {{$info->semester}} - Kelas {{$info->kelas}}</p>
                </div>
                
                <div class="row" style="width: 100%">
                    <div class="col-md-6">
						<form action="{{route('nilai.download')}}" method="POST">
							@csrf
							<input type="hidden" name="id" value="{{$info->id}}">
							<a><button type="submit" class="btn btn-info">Download Template Penilaian</button></a>
						</form>
                    </div>
					<div class="col-md-4" style="text-align: right">
						<a><button type="button" id="tombolUp" data-toggle="modal" data-target="#modalUpload" class="btn btn-danger" value="{{$info->id}}">Upload Penilaian</button></a>
					</div>
					<div class="col-md-2" style="text-align: right">
						<form action="{{route('nilai.total')}}" method="POST">
							@csrf
							<input type="hidden" name="id" value="{{$info->id}}">
							<a><button class="btn btn-primary">Download Hasil</button></a>
						</form>
                    </div>
                </div><br>
				
				<form action="{{route('nilai.detail.submit')}}" method="post">
				@csrf
				<input type="hidden" name="id" value="{{$info->id}}">
				<table style="width:100%" id="list">
                    <thead>
                        <tr>
                            <th style="width: 5%">No.</th>
                            <th style="width: 10%">NRP</th>
							<th style="width: 30%">Nama</th>
							@foreach ($header as $item)
								<th style="width: 10%">{{$item}}</th>
							@endforeach
                            <th style="width: 10%">Rata-Rata</th>
                            <th style="width: 10%">Nilai Huruf</th>
                        </tr>
                    </thead>
                    <tbody>
						@foreach ($data as $mhs)
						<tr>
                            <td></td>
							<td>{{$mhs->mahasiswa['nrp']}}</td>
							<td style="text-align: left">{{$mhs->mahasiswa['nama']}}</td>
							<input type="hidden" name="id_mhs[]" value="{{$mhs->mahasiswa->id}}">
							@for ($i = 0; $i < count($header); $i++)
								<td>
									<input style="width:100%; text-align: center" type="number" name="{{$mhs->mahasiswa->id}}|{{$i}}" value="{{$mhs->terpisah[$i]}}">
								</td>
							@endfor
							<td>{{$mhs->total}}</td>
                            <td>{{$mhs->nilai_huruf}}</td>
                        </tr>
						@endforeach
                    </tbody>
				</table>
				
				<div style="text-align: center" id="save">
                    <a><button type="submit" style="width: 15%" class="btn btn-success">Simpan</button></a>
				</div>
				</form>
			</div>

			<div id="modalUpload" class="w3-modal w3-round-xlarge" style="z-index: 99999;">
				<div class="w3-modal-content w3-animate-zoom w3-card-4 w3-round-large" style="width: 40%;">
					<header class="w3-container w3-light-grey w3-round-large"> 
						<span data-dismiss="modal" 
						class="w3-button w3-display-topright w3-round-large">&times;</span>
						<h2>Upload</h2>
					</header>
					<form action="{{route('nilai.upload')}}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="w3-container" style="margin-top: 2%;">
						<input type="file" name="nilai"><br>
					</div>
					<footer class="w3-container w3-light-grey w3-round-large" style="text-align: right;">
						<input type="hidden" name="id" id="UpValueId" value="">
						<button type="submit" class="btn btn-success" id="UploadButton" style="margin: 1%;">Submit</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal" style="margin: 1%;">Batal</button>
					</footer>
					</form>
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
			var t = $('#list').DataTable( {
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
		var Id;
		$(document).ready(function(){
			$(document).on('click', '#tombolUp', function () {
				console.log('open modal');
				Id = $(this).val();
				document.getElementById("UpValueId").value = Id;
			});
		});
	</script>
@endsection