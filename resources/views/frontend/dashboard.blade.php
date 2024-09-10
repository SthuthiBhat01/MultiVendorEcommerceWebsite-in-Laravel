@extends('frontend.dashboardlayout.main')

@section('main-container')

		<!--************************************
				Main Start
		*************************************-->
		<main id="listar-main" class="listar-main listar-haslayout">
			<!--************************************
					Dashboard Banner Start
			*************************************-->
			<div class="listar-dashboardbanner">
				<ol class="listar-breadcrumb">
					<li><a href="javascript:void(0);">Home</a></li>
					<li class="listar-active">Dashboard</li>
				</ol>
				<h1>Hello  {{ Auth::user()->name }} </h1>
				
			</div>
			<!--************************************
					Dashboard Banner End
			*************************************-->
			<!--************************************
					Dashboard Alert Start
			*************************************-->
			
			<!--************************************
					Dashboard Alert End
			*************************************-->
			<!--************************************
					Dashboard Content Start
			*************************************-->
			<div id="listar-content" class="listar-content">
				<form class="listar-formtheme listar-formaddlisting listar-formdashboard">
					<div class="row">
						
	

						
					</div>
				</form>
			</div>
			<!--************************************
						Dashboard Content End
			*************************************-->
		</main>
		<!--************************************
					Main End
		*************************************-->
		@endsection