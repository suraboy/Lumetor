@extends('layout')
@section('title',$title)
@section('content')
 {{dump("edit view")}}
 <div class="row">
 	<div class="col-md-6 form form-control">
 		@if(count($errors) > 0)
 		<span class="input-text text-red">
 			{{ $errors->first() }}
 		</span>
 		@endif
 		 {!! Form::open(['url' => '/{replace_url}/update','class' => 'form form-control' ,'method' => 'post']) !!}
 		 <div class="input-block">
 		 	<span class="input-text">
 		 		<i class="fa fa-upload"></i> please insert product id
 		 	</span>
 		 	{!! Form::hidden('id', $data->product_id) !!}
 		 	{!! Form::text('product_id',$data->product_id,['class' => 'form-control','placeholder' => 'input product id']) !!}
 		 	{!! Form::button('submit',['type'=> 'submit','class' => 'btn btn-primary'])!!}
 		 </div>
 		 {!! Form::close() !!}
 	</div>
 </div>
@endsection
@push('extends-scripts')
  @include('{replace_sm}.script')
@endpush
@push('extends-style')
  @include('{replace_sm}.style')
@endpush
