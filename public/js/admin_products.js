$( document ).ready(function() {

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });



    $.ajax({
        type: 'GET',
        url : "/load-products",

        success : function (data) {
            $('.load_products').html(data);

            //blue color scheme for iCheck
            $('input[type="checkbox"].skin-blue, input[type="radio"].skin-blue').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass   : 'iradio_square-blue'
            })

        }
    });




    if ($('.load_images')[0]) {


        var dataform = new Object();
        dataform.product_id = $("#product_id").val();

        $.ajax({
            type: 'POST',
            data: dataform,
            url : "/load-photos",

            success : function (data) {
                $('.load_images').html(data);
            }
        });
    }




    $( "body" ).on( "click", "#save-product", function(event) {
        $("form[name='edit_product']").find('.has-error').removeClass("has-error");
        event.preventDefault();


        var name = $("#name").val();
        var description = $("#description").val();
        var price = $("#price").val();
        var weight = $("#weight").val();
        var in_stock = $("#in_stock").val();


        var dataform = $("form[name='edit_product']").serializeArray();
        console.log(dataform);



   var dataform = $("form[name='edit_product']").serializeArray();
        console.log(dataform);

        var error = false;
        jQuery.each( dataform, function( i, val ) {
            console.log(val.name);
            console.log(val.value);


            if ( val.value == '' && val.name != 'active'){

                $("#"+val.name).parent().addClass("has-error");

              error = true;
            }

        });

        if ( error == true ){
            return false;
        }

        $.ajax({
            dataType: "json",
            data: dataform,
            type: 'POST',
            url : "/save-product",

            success : function (data) {

                if ( data.success == 'true'){
                    $('#modal-window .modal-title').html("Saved Product");
                    $('#modal-window').addClass('modal-success')
                    $('#modal-window').modal('show');

                    $('#modal-window .modal-body').html("The product was successfully saved.");

                    if ($('#new')[0]) {
                        setTimeout(function () {
                            window.location.href = '/admin/product/'+ data.product_id;
                        }, 2000);
                    }

                    $.ajax({
                        type: 'GET',
                        url : "/load-categories",

                        success : function (data) {
                            $('.load_categories').html(data);
                        }
                    });


                } else {
                    $('#modal-window .modal-title').html("Saved Product");
                    $('#modal-window').addClass('modal-danger')
                    $('#modal-window').modal('show');

                    $('#modal-window .modal-body').html("There was a problem.");
                }

            }
        });

    });

    $( "body" ).on( "ifUnchecked", ".activeproduct .icheckbox_square-blue input", function(event) {

    //  alert("uncheck") ;

      var dataform = new Object();
      dataform.active = 0;
      dataform.product_id = $(this).attr("title");

        $.ajax({
            dataType: "json",
            data: dataform,
            type: 'POST',
            url: "/update-active-product",

            success: function (data) {


            }

        });

    });

    $( "body" ).on( "ifChecked", ".activeproduct .icheckbox_square-blue input", function(event) {


//        alert("checked") ;
        var dataform = new Object();
        dataform.active = 1;
        dataform.product_id = $(this).attr("title");

        $.ajax({
            dataType: "json",
            data: dataform,
            type: 'POST',
            url: "/update-active-product",

            success: function (data) {


            }

        });
    });

    $( "body" ).on( "ifUnchecked", ".featured .icheckbox_square-blue input", function(event) {

        //  alert("uncheck") ;

        var dataform = new Object();
        dataform.featured = 0;
        dataform.product_id = $(this).attr("title");

        $.ajax({
            dataType: "json",
            data: dataform,
            type: 'POST',
            url: "/update-featured-product",

            success: function (data) {


            }

        });

    });

    $( "body" ).on( "ifChecked", ".featured .icheckbox_square-blue input", function(event) {


//        alert("checked") ;
        var dataform = new Object();
        dataform.featured = 1;
        dataform.product_id = $(this).attr("title");

        $.ajax({
            dataType: "json",
            data: dataform,
            type: 'POST',
            url: "/update-featured-product",

            success: function (data) {


            }

        });
    });

    $( "body" ).on( "click", "#upload-image", function(event) {

        var form = $("form[name='upload_image']")[0];
        var dataform = new FormData(form);

        var photo_name = $("#photo_name").val();
        if ( photo_name == ''){
            $("#photo_name").parent().addClass("has-error");
            return false;
        }

        $.ajax({
            dataType: "json",
            data: dataform,
            type: 'POST',
            url: "/upload-image",
            cache:false,
            processData: false,
            contentType: false,
            success: function (data) {

                if ( data.success == 'true') {

                    $('#modal-window .modal-title').html("Upload Photo");
                    $('#modal-window').addClass('modal-success')
                    $('#modal-window').modal('show');

                    $('#modal-window .modal-body').html("The photo was successfully uploaded.");
                    console.log(data);

                    var dataform = new Object();
                    dataform.product_id = $("#product_id").val();

                    $.ajax({
                        type: 'POST',
                        data: dataform,
                        url: "/load-photos",

                        success: function (data) {
                            $('.load_images').html(data);
                        }
                    });
                }else {

                    $('#modal-window .modal-title').html("Upload Photo");
                    $('#modal-window').addClass('modal-danger')
                    $('#modal-window').modal('show');

                    $('#modal-window .modal-body').html("There was a problem.");
                }
            }
        });

    });


    $( "body" ).on( "click", ".delete-product", function() {


        $('#modal-window .modal-title').html( $(this).attr("title"));

        $('#modal-window .modal-body').html('<p>Are you sure you want to delete this product?</p><button type="button" class="btn btn-lg btn-danger "  name="'+$(this).attr('id')+'" id="delete-product" >DELETE</button>');
        $('#modal-window').addClass('modal-danger');
        $('#modal-window').modal('show');



    });


    $( "body" ).on( "click", "#delete-product", function(event) {


        event.preventDefault();

        var dataform = new Object();
        dataform.product_id  = $(this).attr("name");

        console.log(dataform);

        $.ajax({
            dataType: "json",
            data: dataform,
            type: 'POST',
            url : "/delete-product",

            success : function (data) {

                if ( data.success == 'true'){
                    $('#modal-window .modal-body').html("The product was successfully deleted.");

                    $.ajax({
                        type: 'GET',
                        url : "/load-products",

                        success : function (data) {
                            $('.load_products').html(data);
                        }
                    });


                } else {
                    $('#modal-window .modal-body').html("There was a problem.");
                }

            }
        });

    });


    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });


});