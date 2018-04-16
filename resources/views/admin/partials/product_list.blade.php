@if ( isset($empty))
    <p><em>Sorry, there are no products. Please add a new one.</em></p>
@else
    <table class="table ">
        <thead><tr><th></th><th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>In Stock</th><th>Active</th><th>Featured</th><th></th></tr></thead>
        <tbody>
        @foreach($products AS $product)
            <tr><td><img src="{!! $product->photo_location !!}" style="width:100px;" /></td><td> {{$product->productName }}</td><td>{{$product->description}}</td><td>${{$product->price}}</td><td>{{$product->categoryName}}</td>
                <td>{{$product->in_stock}}</td>
                <td class="activeproduct">  <input type="checkbox"  name="active" class=" skin-blue "  title="{{$product->id }}" {!!  $product->active == '0' ? "" : 'checked'  !!} />
                </td>
                <td class="featured">  <input type="checkbox"  name="featured" class=" skin-blue "  title="{{$product->id }}" {!!  $product->featured == '0' || $product->featured == NULL ? "" : 'checked'  !!} />
                </td>
                <td> <a href="/admin/product/{{$product->id }}"><button type="button" class="btn btn-sm btn-success edit-product" >Edit</button></a>
                    <button type="button" class="btn btn-sm btn-danger delete-product" title="{{$product->productName}}" id="{{$product->id }}" >X</button>


                </td></tr>
        @endforeach
        </tbody>
    </table>

@endif
