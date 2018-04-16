@if ( isset($empty))
    <p><em>Sorry, there are no categories. Please add a new one.</em></p>
@else
    <table class="table">
        <thead><tr><th>Name</th><th></th></tr></thead>
        <tbody>
        @foreach($categories AS $category)
            <tr><td> {{$category->name }}</td><td> <button type="button" class="btn btn-sm btn-success edit-category" title="{{$category->id }}">Edit</button>
                    <button type="button" class="btn btn-sm btn-danger delete-category" title="{{$category->id }}">Delete</button>
                </td></tr>
        @endforeach
        </tbody>
    </table>

@endif
<button type="button" id="add-category" class="btn btn-info">Add New Category</button>