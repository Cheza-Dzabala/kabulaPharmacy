/**
 * Created by cheza on 8/30/16.
 */


function processPOS() {


    amountElement = document.getElementById('moneyReceived');
    processNoteTitle = document.getElementById('processNoteTitle');
    processResult = document.getElementById('processResult');

    if (amountElement.value < purchaseTotal)
    {
        processNoteTitle.innerHTML =  'Error';
        processResult.innerHTML = 'Money Tendered is less than the purchase total. Cannot process transaction.';
    }else if(amountElement.value == '')
    {
        processNoteTitle.innerHTML =  'Error';
        processResult.innerHTML = 'Please input an amount tendered by the customer. Cannot process transaction.';
    }else if(purchaseTotal == 0)
    {
        processNoteTitle.innerHTML =  'Error';
        processResult.innerHTML = 'Please add a stock item to purchase. Cannot process transaction.'
    }else{
        document.getElementById('tenderedAmount').value = amountElement.value;
        processNoteTitle.innerHTML =  'Successful';
        processResult.innerHTML = 'You can now check out.';
        document.getElementById('checkOutBtn').removeAttribute('disabled');
    }
}

function checkout() {
    document.getElementById('checkoutForm').submit();
}
