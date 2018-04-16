@if ( isset($empty))

@else
    <h2 class="page-header">Product Photos</h2>
    <div class="row">
        @foreach($photos AS $key => $photo)


            <div class="col-md-3">
                <div class="box ">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$photo->name}}</h3>
                    </div>
                    <div class="box-body ">


                        <div class="col-md-12">




                            <a href="{{$photo->photo_location}}" data-toggle="lightbox" data-title="{{$photo->name}}">
                                <img src="{{$photo->photo_location}}" class="img-responsive">
                            </a>


                        </div>
                    </div>
                </div>

            </div>




        @endforeach

    </div>

@endif
