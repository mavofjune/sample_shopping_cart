$( document ).ready(function() {

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $.ajax({
        type: 'GET',
        url : "/load-categories",

        success : function (data) {
            $('.load_categories').html(data);
        }
    });

    $( "body" ).on( "click", ".edit-category", function() {

var formedit = new Object();

        formedit.category_id  = $(this).attr('title');



        $('#modal-window .modal-title').html("Edit Category");
        $('#modal-window').modal('show');

        $.ajax({
            type: 'POST',
            data: formedit,
            url : "/edit-category",

            success : function (data) {
                $('#modal-window .modal-body').html(data);
            }
        });

    });

    $( "body" ).on( "click", ".delete-category", function() {

        var formedit = new Object();

        formedit.category_id  = $(this).attr('title');
        formedit.delete = 'true';



        $('#modal-window .modal-title').html("Delete Category");
        $('#modal-window').modal('show');

        $.ajax({
            type: 'POST',
            data: formedit,
            url : "/edit-category",

            success : function (data) {
                $('#modal-window .modal-body').html(data);
            }
        });

    });

    $( "body" ).on( "click", "#add-category", function() {
     $('#modal-window .modal-title').html("Add new Category");
        $('#modal-window').modal('show');

        $.ajax({
            type: 'POST',
            url : "/edit-category",

            success : function (data) {
                $('#modal-window .modal-body').html(data);
            }
        });

    });

    $( "body" ).on( "click", "#save-category", function(event) {

        event.preventDefault();

   var dataform = $('form').serializeArray();
        console.log(dataform);

        $.ajax({
            dataType: "json",
            data: dataform,
            type: 'POST',
            url : "/save-category",

            success : function (data) {

                if ( data.success == 'true'){
                    $('#modal-window .modal-body').html("The category was successfully saved.");

                    $.ajax({
                        type: 'GET',
                        url : "/load-categories",

                        success : function (data) {
                            $('.load_categories').html(data);
                        }
                    });


                } else {
                    $('#modal-window .modal-body').html("There was a problem.");
                }

            }
        });

    });

    $( "body" ).on( "click", "#delete-category", function(event) {

        event.preventDefault();

        var dataform = $('form').serializeArray();
        console.log(dataform);

        $.ajax({
            dataType: "json",
            data: dataform,
            type: 'POST',
            url : "/delete-category",

            success : function (data) {

                if ( data.success == 'true'){
                    $('#modal-window .modal-body').html("The category was successfully deleted.");

                    $.ajax({
                        type: 'GET',
                        url : "/load-categories",

                        success : function (data) {
                            $('.load_categories').html(data);
                        }
                    });


                } else {
                    $('#modal-window .modal-body').html("There was a problem.");
                }

            }
        });

    });




});