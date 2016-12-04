/**
 * Created by cheza on 8/30/16.
 */

var item = '';

var price = 0;

var id = '';

var count = 0;

var subTotal = 0;

var purchaseTotal = 0;


function changeItem(sel, itemPrice, itemId) {
     item = sel;
     price = itemPrice;
    id = itemId;
}


function addStock() {


    var quantity = document.getElementById('quantity').value;

    var renderArea = document.getElementById('stockItems'); //Render Area for stocks being bought

    if(item == '') //Check if item has a value
    {
        alert('no item specified');
    }else if (quantity == ''){ //Verify Quantity Has Been Entered
        alert('no quantity specified');
    }else{

        var row = document.createElement('tr');
            row.setAttribute('id', 'item_'+count);

        var col1 = document.createElement('td');
            col1.innerHTML = item;

        var col2 = document.createElement('td');
            col2.innerHTML = quantity;

        var col3 = document.createElement('td');
            var total = price*quantity;
            col3.innerHTML = total.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");

        var col4 = document.createElement('td');
            col4.innerHTML = '<button class="btn bg-teal-600" onclick="deleteRow(this)">Remove<i class="icon-diff-removed position-right"></i></button>';

        row.appendChild(col1);
        row.appendChild(col2);
        row.appendChild(col3);
        row.appendChild(col4);

        renderArea.appendChild(row);
        count += 1;

        subTotal += total;
        purchaseTotal += total;

        setTotals();

        createElement(quantity);
    }

}

//Remove Rows
function deleteRow(selRow){

    var index = selRow.parentNode.parentNode.rowIndex;

    var formatted = document.getElementById("stocksTable").rows[index].cells[2].innerHTML;
    var number = Number( formatted.replace(/[^0-9\.]+/g,""));
    document.getElementById("stocksTable").deleteRow(index);
    subTotal -= number;
    purchaseTotal -= number;
    setTotals();

}

function setTotals() {
    document.getElementById('subTotal').innerHTML = subTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    document.getElementById('purchaseTotal').innerHTML = purchaseTotal.toFixed(2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    document.getElementById('purchaseAmount').value = purchaseTotal;
}

function createElement(qty) {
    var stockItem = document.createElement('input');
        stockItem.setAttribute('name', 'stockItem['+id+']');
        stockItem.setAttribute('id', id);
        stockItem.setAttribute('value', qty);
        stockItem.setAttribute('type', 'hidden');
        document.getElementById('checkoutForm').appendChild(stockItem);
}