@extends('layout')
@section('title',$title)
@section('content')

@if(isset($data['item']))
<div class="row">
 	<div class="col-md-6">
	 @foreach ($data['item'] as $key => $item)
	 	<a class="btn btn-primary" href="{{url('/{replace_url}/create')}}"> create</a>
	 	<a class="btn btn-primary" href="{{url('/{replace_url}/edit',['id' => $item->id])}}"> edit</a>
	 	<a class="btn btn-primary" href="{{url('/{replace_url}/detail',['id' => $item->id])}}"> detail</a>
	 	<a class="btn btn-primary" href="#" onclick="document.getElementById('delete-product-recently-{{$item->id}}').submit();"> delete</a>
	 	{{Form::open(['url' => '/{replace_url}/delete','style' =>'display:none;','id' => '{replace_url}-'.$item->id])}}
	 	{{Form::text('id',$item->id)}}
	 	{{Form::close()}}
	 	{{dump($item)}}
	 @endforeach
	 <div class="box box-success">
	 	 <div class="box-footer">
            <div class="pull-left">Found : {{number_format($data->total())}} item</div>
            <div class="pull-right">
                {!! $data->appends(Request::all())->links() !!}
            </div>
            <div class="clearfix"></div>
        </div><!-- /.box-footer -->
	 </div>
 	</div>
 </div>
@endif

@endsection

@push('extends-scripts')
	@include('{replace_sm}.script')
@endpush

@push('extends-style')
	@include('{replace_sm}.style')
@endpush
