$(document).ready(function() {
    $("input[name='updates[]'").change(function(event) {
        let val = parseInt($(this).val());
        let id = $(this).get()[0].id.split('_')[1];
        console.log(val, id);

        let formdata = {
            qty: val,
            id: id
        };

        let unit_price = parseInt($(`.unit-price-${id}`)[0].innerHTML);
        let old_price = parseInt($(`span.line-item-total[data-id='${id}']`).html());
        let new_price = unit_price * val;
        $(`span.line-item-total[data-id='${id}']`).html(new_price);
        // console.log(old_price);
        let total_price = $(`span.total_price[data-id='${id}'] b`);


        let old_total_price = parseInt(total_price.html());
        // console.log(old_total_price);
        // console.log(new_price);
        // console.log(total_price.html());

        let new_total_price = new_price - old_price + parseInt(total_price.html());
        total_price.html(new_total_price);

        $.ajax({
            url: 'qty-change.php',
            type: 'GET',
            cache: false,
            data: formdata,
            success: function(res) {
                // console.log(res);
            },
            fail: function(response) {
                // console.log(response);
            }
        })
    })
})