<div class="row">

    <div class="col-md-12">
        <form name="edit_category">
            {!! isset($category_id) ? '<input type="hidden" name="category_id" value="' . $category_id . '" />' : '' !!}

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
                            <button type="button" class="btn btn-danger" id="delete-category">Delete</button>
                        </div>
                    </div>
                </div>
            @else
                <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label>Category Name</label>
                        <input type="text" name="name" id="name" class="form-control" required value="{{ isset($name) ? $name : ''  }}" />
                    </div>
                </div>
            </div>



            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success" id="save-category">Save</button>
                    </div>
                </div>
            </div>
            @endif

        </form>
    </div>
</div>