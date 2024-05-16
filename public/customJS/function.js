
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
        <div class="col-2 col-sm-2">
            <div class="form-group">
            <label>Item</label>
            <input type="input" class="form-control" id=""  name="item[]" placeholder="Enter Items" />
            </div>
        </div>
        <div class="col-2 col-sm-2">
            <div class="form-group">
            <label>Description</label>
            <input type="input" class="form-control" id=""  name="description[]" placeholder="Enter Description" />
            </div>
        </div>
        <div class="col-2 col-sm-1">
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" class="form-control input_decimal_field quantity" id="quantity_${items_count}" data-unique-id=${items_count} name="quantity[]" placeholder="Quantity" />
            </div>
        </div>
        <div class="col-2 col-sm-1">
            <div class="form-group">
                <label>Unit Price</label>
                <input type="number" class="form-control input_decimal_field unit_price" id="unit_price_${items_count}" data-unique-id=${items_count} name="unit_price[]" placeholder="Unit Price" />
            </div>
        </div>
        <div class="col-2 col-sm-1">
            <div class="form-group">
                <label>Sub Cost</label>
                <input type="number" class="form-control input_decimal_field " id="sub_cost_${items_count}" name="total_Cost[]" placeholder="Sub Cost" />
            </div>
        </div>
        <div class="col-2 col-sm-1">
            <div class="form-group">
                <label>GST Rate %</label>
                <input type="number" class="form-control input_decimal_field gst_rate" id="gst_rate_${items_count}"  data-unique-id=${items_count} name="total_Cost[]" placeholder="GST Rate" />
            </div>
        </div>
        <div class="col-2 col-sm-1">
            <div class="form-group">
                <label>GST Amount</label>
                <input type="number" class="form-control input_decimal_field " id="gst_amount_${items_count}" name="total_Cost[]" placeholder="GST Amount" />
            </div>
        </div>
        <div class="col-2 col-sm-1">
            <div class="form-group">
                <label>Total Amount</label>
                <input type="number" class="form-control input_decimal_field " id="total_amount_${items_count}" name="total_Cost[]" placeholder="Total Amount" />
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
        if($('#unit_price_' + idValue).val() !== '')
        {
        var Quantity = $(this).val();
        var cost = $('#unit_price_' + idValue).val();
        var total_cost = Quantity * cost;
        $('#sub_cost_' + idValue).val(total_cost);
        }
    });

    $(document).on('change', '.unit_price', function(event) {
        var idValue = $(this).data('unique-id');
        if($('#quantity_' + idValue).val() !== '')
        {
        var cost = $(this).val();
        var Quantity = $('#quantity_' + idValue).val();
        var total_cost = Quantity * cost;
        $('#sub_cost_' + idValue).val(total_cost);
        }
    });

    $(document).on('change', '.gst_rate' , function() {
        var idValue = $(this).data('unique-id');

        var percentage =  parseFloat($('#gst_rate_' + idValue).val());
        var sub_cost =  parseFloat($('#sub_cost_'+ idValue).val());

        if (!isNaN(percentage) && !isNaN(sub_cost)) {
            var gstAmount = sub_cost * (percentage / 100);
            var finalPrice = sub_cost + gstAmount;

            $('#gst_amount_' + idValue).val(gstAmount.toFixed(2));
            $('#total_amount_' + idValue).val(finalPrice.toFixed(2));


        } else {
            console.err('Invalid input for unit price or GST rate');
        }
        $(this).calcualteTotalCost();
    });
});

$.fn.calcualteTotalCost = function () {
    var totalCost_calculation = 0;
    for (var i = 1; i <= items_count; i++) {
        var cost = parseFloat($('#total_amount_' + i).val());
        if (isNaN(cost)) {
            cost = 0;
        }
        totalCost_calculation += cost;
    }
    $('#final_amount').val(totalCost_calculation.toFixed(2));
}