
// Add Category 
$("#add_category_form").unbind('submit').bind('submit', function () {
    event.preventDefault();
    var form = $(this);
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: new FormData($('#add_category_form')[0]),
        processData: false,
        contentType: false,
        success:function(response){
            response = JSON.parse(response);
            // $(document).Toasts('create', {
            //     class: response.class,
            //     title: response.title,
            //     body: response.messages
            // });
            // $('#add_category_form')[0].reset();
            
            alert(response.messages);
            location.reload();
        },
        error:function(e){
            console.log(e);
        }
    })
})


// delete stock item.... 
function delete_category(itemId){
    
    console.log("id");
    console.log(itemId);
    $.ajax({
        url:"./includes/fetch_category_by_id.php",
        type:'post',
        data: {itemId: itemId },
        dataType : 'json',
        success : function(response) {
            console.log(response.id );
            $('#delete_category_id').val(response.id);

            $('#delete_category').unbind('submit').bind('submit',function(){
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

