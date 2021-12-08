

$.ajax('./includes/fetch_items_on_search.php', {
    type: 'POST',
    dataType: 'json',
    success: function (response) {
        console.log(response);
        horsey(document.getElementById('itemIdsearch'), {
            source: [{list: response}],
            getText: 'name',
            getValue: 'value',
            predictNextSearch(info){
                console.log(info);
                document.getElementById('searchId2').value = info.selection.id;
            }
          });
    }
})