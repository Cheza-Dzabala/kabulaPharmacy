/**
 * Created by cheza on 8/25/16.
 */


function processNumbers(num) {
    amountElement = document.getElementById('moneyReceived');
    amountElement.value = amountElement.value.concat(num);
}

function clearElement() {
    amountElement = document.getElementById('moneyReceived');
    amountElement.value = '';
}