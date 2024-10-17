

var totalAmountEl = document.getElementById('totalAmountInput');
var taxpercentagaeEl = document.getElementById('taxPercentage');
var netAmountEl = document.getElementById('netAmount');


var totalAmountDisplayEl = document.getElementById('totalAmountDisplay');
var taxDisplayEl = document.getElementById('taxDisplay');
var netAmountDisplayEl = document.getElementById('netAmountDisplay');


function calculateNetAmount() {

    // console.log("calculating tax");
    var taxAmount = (taxpercentagaeEl.value/100) * totalAmountEl.value;
    console.log(taxAmount);


    var netAmount = parseInt(totalAmountEl.value) + parseInt(taxAmount);
    console.log(netAmount);
    netAmountEl.value = netAmount;

    totalAmountDisplayEl.innerHTML = totalAmountEl.value;
    taxDisplayEl.innerHTML = taxAmount;
    netAmountDisplayEl.innerHTML = netAmount;

}



function displayTotalAmount() {
    var totalInputEl = document.getElementById('totalInput');
    var totalDisplayEl = document.getElementById('totalDisplay');
    totalDisplayEl.innerHTML = totalInputEl.value;
}
