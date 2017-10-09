@extends('layouts.admin')
@section('content')
@if($lessons_type === 'next')
    @include('admin.nextlessons')
    @endif
@if($lessons_type === 'previous')

@include('admin.prevlessons')

    @endif



@endsection