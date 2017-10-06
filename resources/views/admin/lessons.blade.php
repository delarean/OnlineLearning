@extends('layouts.admin')
@section('content')
@isset($next_lessons)
    @include('admin.nextlessons')
    @endisset
@isset($previous_lessons)

@include('admin.prevlessons')

    @endisset



@endsection