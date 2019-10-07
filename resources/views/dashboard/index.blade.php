@extends('layouts.master')

@section('pagetitle')
	Dashboard
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
				 <div class="row row-in">
				  <div class="col-lg-4 col-sm-12 row-in-br">
					<ul class="col-in">
						<li>
							<span class="circle circle-md bg-danger"><i class="ti-clipboard"></i></span>
						</li>
						<li class="col-last"><h3 class="counter text-right m-t-15">{{$data['pendaftar']}}</h3></li>
						<li class="col-middle">
							<h4>Total Pendaftar</h4>
							<div class="progress">
							  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> 
								  <span class="sr-only">100% Complete (success)</span> 
							  </div>
							</div>
						</li>
					</ul>
				  </div>
				</div>   
			</div>
		</div>
	</div>
@endsection