
$("#add_stock_form").unbind('submit').bind('submit', function () {
    // e.preventDefault();
    event.preventDefault();
    var form = $(this);
    // console.log(form);
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        // data: form.serialize(),
        // dataType: 'json',
        data: new FormData($('#add_stock_form')[0]),
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
            // $('#add_stock_form')[0].reset();
        },
        error:function(e){
            console.log(e);
        }
    })
})

// delete stock item.... 
function delete_item(itemId){
    
    console.log("id");
    console.log(itemId);
    $.ajax({
        url:"./includes/fetch_stock_item_by_id.php",
        type:'post',
        data: {itemId: itemId },
        dataType : 'json',
        success : function(response) {
            console.log(response.id );
            $('#delete_stock_id').val(response.id);

            $('#delete_stock_item').unbind('submit').bind('submit',function(){
                event.preventDefault();
                var form = $(this);
                console.log(form);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    dataType: 'json',
                    success:function(response){
                        // console.log(response);
                        // $(document).Toasts('create', {
                            //     class: response.class,
                            //     title: response.title,
                            //     // subtitle: 'Subtitle',
                            //     body: response.messages
                            //   });
                        alert(response.messages);
                        location.reload();
                        //   $("#updateButton").attr("data-dismiss","modal");
                    }
                })

                    
            })
        },
        error: function(err){
            console.log(err);
        }
    })
}



// view barcode
function print_barcode(itemId){
    
    console.log("id");
    console.log(itemId);
    $.ajax({
        url:"./includes/fetch_stock_item_by_id.php",
        type:'post',
        data: {itemId: itemId },
        dataType : 'json',
        success : function(response) {
            console.log(response.itemId);

            document.getElementById("barcodeId").src = "barcode/barcode.php?text="+response.itemId+"&size=50&print=true";
            document.getElementById("printButton").setAttribute("onclick", "location.href='print_barcode_page.php?id="+response.itemId+"'");

        },
        error: function(err){
            console.log(err);
        }
    })
}



// view image
function view_item_image(itemId){
    
    console.log("id");
    console.log(itemId);
    $.ajax({
        url:"./includes/fetch_stock_item_by_id.php",
        type:'post',
        data: {itemId: itemId },
        dataType : 'json',
        success : function(response) {
            console.log(response.id );

            document.getElementById("imageId").src = "media/stock/"+response.image;

        },
        error: function(err){
            console.log(err);
        }
    })
}


// view stock item
function view_item(itemId){
    
    console.log("id");
    console.log(itemId);
    $.ajax({
        url:"./includes/fetch_stock_item_by_id.php",
        type:'post',
        data: {itemId: itemId },
        dataType : 'json',
        success : function(response) {
            console.log(response.id );

            document.getElementById("stock_item_id").innerHTML = response.itemId;
            document.getElementById("stock_item_date").innerHTML = response.date;
            document.getElementById("stock_item_name").innerHTML = response.name;
            document.getElementById("stock_item_comp").innerHTML = response.company;
            document.getElementById("stock_item_desc").innerHTML = response.description;
            document.getElementById("stock_item_qty").innerHTML = response.qty;
            document.getElementById("stock_item_wholeSalePrice").innerHTML = response.wholeSalePrice;
            document.getElementById("stock_item_retailPrice").innerHTML = response.retailPrice;

        },
        error: function(err){
            console.log(err);
        }
    })
}



// update stock item
function edit_item(itemId){
    
    console.log("id");
    console.log(itemId);
    $.ajax({
        url:"./includes/fetch_stock_item_by_id.php",
        type:'post',
        data: {itemId: itemId },
        dataType : 'json',
        success : function(response) {
            console.log(response.id );
            $('#edit_id').val(response.id);
            $('#edit_item_id').val(response.itemId);
            $('#edit_date').val(response.date);
            $('#edit_category').val(response.category);
            $('#edit_name').val(response.name);
            $('#edit_company').val(response.company);
            $('#edit_description').val(response.description);
            $('#edit_qty').val(response.qty);
            $('#edit_whole_sale_price').val(response.wholeSalePrice);
            $('#edit_retail_price').val(response.retailPrice);

            $('#update_stock_form').unbind('submit').bind('submit',function(){
                event.preventDefault();
                // var edit_date = $('#edit_date').val();
                var form = $(this);
                console.log(form);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    // data: form.serialize(),
                    // dataType: 'json',
                    data: new FormData($('#update_stock_form')[0]),
                    processData: false,
                    contentType: false,
                    success:function(response){
                        response = JSON.parse(response);
                        // console.log(response);
                        // $(document).Toasts('create', {
                            //     class: response.class,
                            //     title: response.title,
                            //     // subtitle: 'Subtitle',
                            //     body: response.messages
                            //   });
                            //   $('#edit_add_stock_form')[0].reset();
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
