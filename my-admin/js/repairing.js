
$("#add_repairing_form").unbind('submit').bind('submit', function () {
    // e.preventDefault();
    event.preventDefault();
    var form = $(this);
    // console.log(form);
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        // data: form.serialize(),
        // dataType: 'json',
        data: new FormData($('#add_repairing_form')[0]),
        processData: false,
        contentType: false,
        success:function(response){
            response = JSON.parse(response);
            
            // $(document).Toasts('create', {
                //     class: response.class,
                //     title: response.title,
                //     // subtitle: 'Subtitle',
                //     body: response.messages
                // });
                // $('#add_repairing_form')[0].reset();
            alert(response.messages);
            location.reload();
        },
        error:function(e){
            console.log(e);
        }
    })
})



// delete expense.... 
function delete_repair_record(itemId){
    
    console.log("id");
    console.log(itemId);
    $.ajax({
        url:"./includes/fetch_repair_record_by_id.php",
        type:'post',
        data: {itemId: itemId },
        dataType : 'json',
        success : function(response) {
            console.log(response.id );
            $('#delete_repair_id').val(response.id);

            $('#delete_repair').unbind('submit').bind('submit',function(){
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

