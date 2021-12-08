
$("#add_customer_form").unbind('submit').bind('submit', function () {
    // e.preventDefault();
    event.preventDefault();
    var form = $(this);
    // console.log(form);
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        // data: form.serialize(),
        // dataType: 'json',
        data: new FormData($('#add_customer_form')[0]),
        processData: false,
        contentType: false,
        success:function(response){
            response = JSON.parse(response);

            alert(response.messages);
            location.reload();
            // $(document).Toasts('create', {
            //     class: response.class,
            //     title: response.title,
            //     // subtitle: 'Subtitle',
            //     body: response.messages
            // });
            // $('#add_customer_form')[0].reset();
        },
        error:function(e){
            console.log(e);
        }
    })
})



// delete customer.... 
function delete_customer(itemId){
    
    console.log("id");
    console.log(itemId);
    $.ajax({
        url:"./includes/fetch_customer_by_id.php",
        type:'post',
        data: {itemId: itemId },
        dataType : 'json',
        success : function(response) {
            console.log(response.id );
            $('#delete_customer_id').val(response.id);

            $('#delete_customer').unbind('submit').bind('submit',function(){
                event.preventDefault();
                var form = $(this);
                console.log(form);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    dataType: 'json',
                    success:function(response){
                        // $(document).Toasts('create', {
                        //     class: response.class,
                        //     title: response.title,
                        //     body: response.messages
                        //   });
                        alert(response.messages);
                        location.reload();
                    }
                })

                    
            })
        },
        error: function(err){
            console.log(err);
        }
    })
}



// update customer
function edit_customer(itemId){
    
    console.log("id");
    console.log(itemId);
    $.ajax({
        url:"./includes/fetch_customer_by_id.php",
        type:'post',
        data: {itemId: itemId },
        dataType : 'json',
        success : function(response) {
            console.log(response.id );
            $('#editCustomerId').val(response.id);
            $('#editCustomerName').val(response.name);
            $('#editCustomerPhone').val(response.phone);
            $('#editCustomerAddress').val(response.address);

            $('#edit_customer_form').unbind('submit').bind('submit',function(){
                event.preventDefault();
                var form = $(this);
                console.log(form);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: new FormData($('#edit_customer_form')[0]),
                    processData: false,
                    contentType: false,
                    success:function(response){
                        response = JSON.parse(response);
                        // $(document).Toasts('create', {
                        //     class: response.class,
                        //     title: response.title,
                        //     body: response.messages
                        //   });
                        //   $('#edit_customer_form')[0].reset();
                        alert(response.messages);
                        location.reload();
                    }
                })

                    
            })



        },
        error: function(err){
            console.log(err);
        }
    })
}
