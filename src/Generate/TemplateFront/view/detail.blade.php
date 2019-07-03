@extends('layout')

@section('title',$title)

@section('content')
 {{dump("detail")}}
 {{dump($data)}}
@endsection

@push('extends-scripts')
  @include('{replace_sm}.script')
@endpush

@push('extends-style')
  @include('{replace_sm}.style')
@endpush
