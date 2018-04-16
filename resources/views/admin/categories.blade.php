@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>Product Categories</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Categories</h3>
                </div>
                <div class="box-body load_categories">


                </div>
            </div>
        </div>
    </div>



@stop