@extends('painel.adminlte.full_dashboard')

@section('content')


<div class="row">
  <div class="col-md-12">
    <div class="box box-solid  box-default">
      <div class="box-header with-border">
        <h3 class="box-title"><b>@yield('table_title')</b> </h3>
	  </div>

	  <div class="box-body table-responsive">
    
		@yield('table_body')

	  </div>


	</div> <!-- end box -->
  </div> <!-- end col md12 -->
</div> <!-- end rox -->

@endsection


