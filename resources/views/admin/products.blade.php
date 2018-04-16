@extends('adminlte::page')

@section('title', 'Shopping Cart Products')

@section('content_header')
    <h1>Shopping Cart Products</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Products</h3>
                </div>
                <div class="box-body load_products">


                </div>

            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-12">
        <a href="/admin/product/new"><button type="button" id="add-product" class="btn btn-info">Add New Product</button></a>

    </div>
</div>


@stop