@extends('adminlte::page')

@section('title', 'Shopping Cart Products')

@section('content_header')
    <h1>Edit Product</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ isset($name) ? $name : 'Create New Products'  }}</h3>
                </div>
                <div class="box-body ">
                    <div class="row">

                        <div class="col-md-12">
                            <form name="edit_product">
                                {!! isset($product_id) ? '<input type="hidden" id="product_id" name="product_id" value="' . $product_id . '" />' : '<input type="hidden" id="new" name="new" value="1" />' !!}

                                @if ( isset($delete))
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">{!!  $delete !!}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-danger" id="delete-product">
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Product Name</label>
                                                <input type="text" name="name" id="name" class="form-control" required
                                                       value="{{ isset($name) ? $name : ''  }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Description</label>
                                                <textarea name="description" id="description" class="form-control"
                                                          required>{{ isset($description) ? $description : ''  }}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Category</label>
                                                <select name="category_id" id="category_id" class="form-control">
                                                    @foreach($categories AS $category)
                                                        <option value="{{$category->id }}" {{ $category_id == $category->id ? "selected" : '' }}>{{$category->name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>In Stock</label>
                                                <input type="number" name="in_stock" id="in_stock" class="form-control" required
                                                       value="{{ isset($in_stock) ? $in_stock : ''  }}"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Weight</label>
                                                <input type="number" name="weight" id="weight" class="form-control" required
                                                       value="{{ isset($weight) ? $weight : ''  }}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Price</label>
                                                <div class="input-icon">
                                                    <i>$</i>
                                                    <input type="text" name="price" id="price" class="form-control"
                                                           required value="{{ isset($price) ? $price : ''  }}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Active</label>

                                                <input type="checkbox" id="active" name="active" class="skin-blue"
                                                       id="active" {!!  isset($active) && $active == 0 ? "" : 'checked'  !!} />

                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-success" id="save-product">Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@if ( isset($product_id))
        <div class="col-md-6">
            <div class="box add-images">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Images</h3>
                </div>
                <div class="box-body ">
                    <div class="row">
                        <div class="col-md-12">

                        <form action="" name="upload_image" id="upload_image" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="product_id" value="{{ isset($product_id) ? $product_id : '' }}" />
                            <input type="hidden" name="_token" value="{{ csrf_token()}}">
                            <input type="hidden" name="position" id="position" value="{{ isset($position) ? $position : '' }}" />
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Photo Name <i>(also used for Alt Tag)</i></label>
                                        <input type="text" name="photo_name" id="photo_name" class="form-control" required
                                               value=""/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                            <label>Upload Image(s)</label>

                            <input type="file" name="image_file" />
                                    </div>
                                </div>
                            </div>
                        </form>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                        <button type="button" class="btn btn-success" id="upload-image">Upload
                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    </div>



<div class="load_images"></div>

@stop