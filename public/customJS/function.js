
var table = $(".data-table").DataTable({
    "responsive": true,
    "autoWidth": false,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "fixedHeader": {
        header: true,
        headerOffset: 50
    },
});


document.getElementById('customer').addEventListener('change', function() {
    var customerId = this.value;
    
    // Making an Ajax request
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '/get-customer-address/' + customerId, true);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Update the address in the HTML
            document.getElementById('address').value = xhr.responseText;
        }
    };
    
    xhr.send();
});

var items_count =  0;
$(document).ready(function() {

$('a[name=addNewItem]').click(function (event) {
    items_count++;
    var itemContainer = $('#itemContainer');
    var newDiv = `<div class="row direct_price_section" id="invoice_items_${items_count}">
        <div class="col-2 col-sm-1">
            <div class="form-group">
            <label>Sr No</label>
            <input type="input" class="form-control" name="sr_no[]" value="${items_count}" />
            </div>
        </div>
        <div class="col-3 col-sm-3">
            <div class="form-group">
            <label>Item</label>
            <input type="input" class="form-control" id=""  name="item[]" placeholder="Enter Particulars" />
            </div>
        </div>
        <div class="col-2 col-sm-2">
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" class="form-control input_decimal_field quantity" id="quantity_${items_count}" data-unique-id=${items_count} name="quantity[]" placeholder="Enter The Quantity" />
            </div>
        </div>
        <div class="col-2 col-sm-2">
            <div class="form-group">
                <label>Cost</label>
                <input type="number" class="form-control input_decimal_field cost" id="cost_${items_count}" data-unique-id=${items_count} name="cost[]" placeholder="Enter Cost" />
            </div>
        </div>
        <div class="col-2 col-sm-2">
            <div class="form-group">
                <label>Total Cost</label>
                <input type="number" class="form-control input_decimal_field " id="total_Cost_${items_count}" name="total_Cost[]" placeholder="Enter Dev Price" />
            </div>
        </div>
        <div class="col-1 col-sm-1">
            <button class="btn btn-danger removeDev" data-unique-id=${items_count} type="button">Remove</button>
        </div>
    </div>`;
    itemContainer.append(newDiv);
});

$(document).on('click', '.removeDev', function(event) {
    var idValue = $(this).data('unique-id');
    $('#invoice_items_' + idValue).remove();
    items_count--;
    $(this).calcualteTotalCost();
});


    $(document).on('change', '.quantity', function(event) {
        var idValue = $(this).data('unique-id');
        if($('#cost_' + idValue).val() !== '')
        {
        var Quantity = $(this).val();
        var cost = $('#cost_' + idValue).val();
        var total_cost = Quantity * cost;
        $('#total_Cost_' + idValue).val(total_cost);
        $(this).calcualteTotalCost();
        }
    });

    $(document).on('change', '.cost', function(event) {
        var idValue = $(this).data('unique-id');
        if($('#quantity_' + idValue).val() !== '')
        {
        var cost = $(this).val();
        var Quantity = $('#quantity_' + idValue).val();
        var total_cost = Quantity * cost;
        $('#total_Cost_' + idValue).val(total_cost);
        $(this).calcualteTotalCost();
        }
    });


    $('#cgst, #sgst, #other').on('change', function () {
        var cgst = parseFloat($('#cgst').val()) || 0;
        var sgst = parseFloat($('#sgst').val()) || 0;
        var other = parseFloat($('#other').val()) || 0;
        var total_amount = parseFloat($('#total_amount').val()) || 0;

        var final_amount = cgst + sgst + other + total_amount;
        $('#final_amount').val(final_amount.toFixed(4));
    });

});

$.fn.calcualteTotalCost = function () {
    var totalCost_calculation = 0;
    for (var i = 1; i <= items_count; i++) {
        var cost = parseFloat($('#total_Cost_' + i).val());
        if (isNaN(cost)) {
            cost = 0;
        }
        totalCost_calculation += cost;
    }
    $('#total_amount').val(totalCost_calculation.toFixed(4));
    $('#final_amount').val(totalCost_calculation.toFixed(4));
}