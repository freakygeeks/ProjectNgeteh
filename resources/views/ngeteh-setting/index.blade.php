@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Language Settings</div>

				<div class="panel-body">
					@if (Session::has('message'))
                    	<div class="alert alert-info">{{ Session::get('message') }}</div>
                	@endif
					{!! Html::ul($errors->all()) !!}

					{!! Form::model($ngeteh_settings, array('route' => array('ngeteh-settings.update', $ngeteh_settings->id), 'method' => 'PUT', 'files' => true)) !!}

					<div class="form-group">
					{!! Form::label('language', 'Language') !!}
					{!! Form::select('language', array('en' => 'English', 'id' => 'Indonesia', 'es' => 'Spanish'), Input::old('language'), array('class' => 'form-control')) !!}
					</div>

					{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection