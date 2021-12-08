
var n = 0;
var priceArray = [];


let index = 0;
let myNewIndex = 0;
function search_stock_item() {
    event.preventDefault();
    var key = $('#searchId').val();
    if(key == ""){
        key = $('#searchId2').val();
    }
    // console.log("Key = "+key)

    let index = 0, existingTable = $('#cartTable')[0].childNodes;

    var identify = true;
    while (index < existingTable.length) {
            
        if (existingTable[index].className === key) {
            updated_itemTotalByQty(key);
            identify = false;
            break;
        }
        index++;
    }


    if (identify === true ) {

        $.ajax('./includes/fetch_stock_item_by_barcode.php', {
            type: 'POST',
            data: { key: key },
            dataType: 'json',
            success: function (response) {
                console.log(response.itemId);
                priceArray[n] = response.updated_price;
                n += 1;

                // let itemClass = response.p_key.replace(/-/gi,"");
                let itemClass = response.itemId;
                // var i = 0;
                var tr = document.createElement("tr");
                tr.className = response[1];
                // tr.id = index;
                
                tr.innerHTML = `<td id="pName">${response.name}</td>
                <td id="pKey" style="display:none;">
                    <input type="hidden" name="pKey[]" value="${response.itemId}">
                </td> 
                <td id="pQty">
                <input type="text" class="form-control-sm qty${itemClass}" name="pQty[]" value="0" onchange="itemTotalByQty(${itemClass})" style="width:100%">
                </td>
                <td id="pPrice">
                <input type="text" class="form-control-sm price${itemClass}" name="pPrice[]" value="${response.retailPrice}" readonly style="width:100%">
                </td> 
                <td id="pTotal">
                <input type="text" id="${index}" class="form-control-sm total${itemClass}" name="pTotal[]" value="0"  readonly style="width:100%">
                </td> `;
                // itemTotalByQty(response.itemId);

                document.getElementById("cartTable").appendChild(tr);

                index++;
                myNewIndex = index;
                console.log("index = "+index);
                // calculateSubTotal(itemClass);

                // View product detail in product view card...
                $(`#regDate`).val(response.date);
                $(`#productName`).val(response.name);
                // $(`#productCategory`).val(response.category);
                $(`#productDesc`).val(response.description);
                // $(`#productCompany`).val(response.company);
                $(`#productQuantity`).val(response.qty);
                $(`#WholeSalePrice`).val(response.wholeSalePrice);
                $(`#retailPrice`).val(response.retailPrice);



                $('#order_form').unbind('submit').bind('submit',function(){
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
                            alert(response.messages);
                            // $(document).Toasts('create', {
                            //     class: response.class,
                            //     title: response.title,
                            //     // subtitle: 'Subtitle',
                            //     body: response.messages
                            // });
                            location.reload();
                            //   $("#updateButton").attr("data-dismiss","modal");
                        }
                    })
    
                        
                })
            },
            error: function (err) {
                console.log(err);
            }

        });
    }
}

let myOldPrice = 0;

function updated_itemTotalByQty(rowKey) {
    console.log("Row = ".rowKey)
    // rowKey =  rowKey.replace(/-/gi,"");
    $(`.qty${rowKey}`).val( Number($(`.qty${rowKey}`).val()) + 1);
    var qty = $(`.qty${rowKey}`).val();
    var price = $(`.price${rowKey}`).val();
    var total = price * qty;
    $(`.total${rowKey}`).val(total);

    // myOldPrice = 0;
    calculateSubTotal(rowKey);

}

function itemTotalByQty(item) {
    // console.log("run");
    // console.log("ID = "+item);
    var qty = Number($(`.qty${item}`).val());
    var price = Number($(`.price${item}`).val());

    // console.log("qty = "+qty);
    var total = price * qty;
    $(`.total${item}`).val(total);
    // console.log("Total = "+total);

    // myOldPrice = 0;
    calculateSubTotal(item);
    
}

function calculateSubTotal(item){
    
    let subTotal = 0;

    console.log("my new index = "+myNewIndex)
    for(var i = 0; i< myNewIndex ; i++ ){
        var itemTotal = Number($(`#${i}`).val());
        subTotal += itemTotal;
        console.log("itemTotal = "+itemTotal);
    }
    
    $(`#subTotal`).val( subTotal);
    $(`#grandTotal`).val( subTotal);

    calETC();
    calDiscount();
    
}

function calETC(){
    var etc = Number($(`#etc`).val());
    var subTotal = Number($(`#subTotal`).val());
    var grandTotal = Number(etc + subTotal);

    if(etc > 0){
        document.getElementById('discount').disabled = true; 
    }else{
        document.getElementById('discount').disabled = false; 
    }

    $(`#grandTotal`).val( grandTotal);

    calPaid();
}


function calDiscount(){
    var discount = Number($(`#discount`).val());
    var subTotal = Number($(`#subTotal`).val());
    var grandTotal = Number(subTotal - discount);

    if(discount > 0){
        document.getElementById('etc').disabled = true; 
    }else{
        document.getElementById('etc').disabled = false; 
    }

    $(`#grandTotal`).val( grandTotal);

    calPaid();
}


function calPaid(){
    var grandTotal = Number($(`#grandTotal`).val());
    var paid = Number($(`#paid`).val());
    var balance = Number(grandTotal - paid);

    $(`#balance`).val( balance);
}


function check(){
    console.log("run");
    let keyId = document.getElementById("searchId2").value;
    console.log(keyId)
}