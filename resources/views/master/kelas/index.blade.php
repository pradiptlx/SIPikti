@extends('layouts.master')

@section('pagetitle')
	Kelas
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
	<style type="text/css">
		i.material-icons {
			vertical-align: middle;
		}
	</style>
@endsection

@section('content')
<div class="row">
		<div class="col-sm-12">
			<div class="white-box">
				<div class="row row-in" style="margin-bottom: 1%;">
					@if (session('status'))
						<div class="alert alert-success" role="alert">
							{{ session('status') }}
						</div>
					@endif
					<a href="{{route('master.kelas.create')}}"><button class="btn btn-info">Tambah Kelas</button></a>
				</div>
				<div class="row row-in">
					<table id="list" class="table table-striped table-hover table-bordered" style="text-align: center; width: 100%;">
						<thead>
							<tr>
								<th style="width: 5%;">No. </th>
								<th style="width: 20%; text-align: center;">Kelas</th>
								<th style="width: 25%; text-align: center;">Senin-Kamis</th>
								<th style="width: 35%; text-align: center;">Jumat (Reg) / Sabtu (Eksekutif)</th>
								<th style="width: 15%; text-align: center;">Action</th>
							</tr>
						</thead>
						<tbody>
						
						@foreach ($data as $datas)
							<tr>
								<td></td>
								<td class="sorting_1">{{$datas->nama}}</td>
								<td>{{$datas->jam_SK}}</td>
								<td>{{$datas->jam_J}}</td>
								<td>
									<div class="row" style="margin: 0px;">
									<a data-toggle="tooltip" data-placement="top" title="Edit" href="{{route('master.kelas.edit', $datas->id)}}">
										<button class="btn btn-warning"><i class="material-icons" style="font-size: 18px;">mode_edit</i></button>
									</a>
									{{-- semua data master, button delete ditiadakan --}}
									<a data-toggle="tooltip" data-placement="top" title="Hapus" style="display: none;">
										<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDelete" id="tombolDel" value="{{$datas->id}}"><i class="material-icons" style="font-size: 18px;">delete</i></button>
									</a>
									</div>
								</td>
							</tr>
							<!-- Modal -->
							<div id="modalDelete" class="w3-modal w3-round-xlarge" style="z-index: 99999;">
								<div class="w3-modal-content w3-animate-zoom w3-card-4 w3-round-large" style="width: 40%;">
									<header class="w3-container w3-light-grey w3-round-large"> 
										<span data-dismiss="modal" 
										class="w3-button w3-display-topright w3-round-large">&times;</span>
										<h2>Konfirmasi</h2>
									</header>
									<div class="w3-container" style="margin-top: 2%;">
										<p>Apakah Anda yakin akan menghapus data kelas ini?</p>
									</div>
									<footer class="w3-container w3-light-grey w3-round-large" style="text-align: right;">
										<form action="{{route('master.kelas.delete')}}" method="POST">
											{{ csrf_field() }}
											<input type="hidden" name="id" id="valueId" value="">
											<button type="submit" class="btn btn-success" id="DeleteButton" style="margin: 1%;">Ya</button>
											<button type="button" class="btn btn-danger" data-dismiss="modal" style="margin: 1%;">Tidak</button>
										</form>
									</footer>
								</div>
							</div>
						@endforeach
						</tbody>
					</table>
				</div>
		</div>
	</div>
</div>
@endsection

@section('js')
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('js/bootstrap.js') }}">
	<script>
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
			$(document).on('click', '#tombolDel', function () {
				console.log('id yg passing');
				Id = $(this).val();
				console.log(Id);
				document.getElementById("valueId").value = Id;
			});
		});
	</script>
@endsection