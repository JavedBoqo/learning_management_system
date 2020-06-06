
function getClientDetail(clientId) {
    var client = localStorage.client;
    if(client != null && typeof client != 'undefined') {
        client = JSON.parse(client);
        for(var i=0;i<client.length;i++) {
            if(client[i][0] == clientId) {
                $('#vendorNo').val(client[i][1]);
                break;
            }
        }
        // console.log(client);
    }   
}

function calculateAdvAmount() {
    var flatRate=$('#flatRate').val();
    var rate= isNaN($('#rate').val()) ? 0 : parseFloat($('#rate').val());
    
    var sizeWidth= 0; var sizeHeight=0; var sizeTotal=0;
    if(flatRate != "" && flatRate == 2){            
        sizeWidth=$('#sizeWidth').val() == ""  || isNaN($('#sizeWidth').val()) ? 0 : parseFloat($('#sizeWidth').val());
        sizeHeight= $('#sizeHeight').val() == "" || isNaN($('#sizeHeight').val()) ? 0 : parseFloat($('#sizeHeight').val());
        sizeTotal = sizeWidth*sizeHeight;
        rate = rate * sizeTotal;
        $('#sizeTotal').val(sizeTotal);
    }
    var specialPositionAmountPercent= isNaN($('#specialPositionAmount').val()) ? 0 : parseFloat($('#specialPositionAmount').val());
    var extraChargesAmountPercent= isNaN($('#extraChargesAmount').val()) ? 0 : parseFloat($('#extraChargesAmount').val());
    var languageChargesAmountPercent= isNaN($('#languageChargesAmount').val()) ? 0 : parseFloat($('#languageChargesAmount').val());
    
    var agencyCommissionPercent= isNaN($('#agencyCommission').val()) ? 0 : parseFloat($('#agencyCommission').val());
    var discount= isNaN($('#discount').val()) ? 0 : parseFloat($('#discount').val());
    
    var netPayable=rate;
    var tmp=0;
    if(rate > 0) {              
        if(specialPositionAmountPercent > 0) {
            tmp=(rate/100)*specialPositionAmountPercent;
            netPayable = netPayable+tmp;
        }
        if(extraChargesAmountPercent > 0) {
            tmp=(rate/100)*extraChargesAmountPercent;
            netPayable = netPayable+tmp;
        }
        if(languageChargesAmountPercent > 0) {
            tmp=(rate/100)*languageChargesAmountPercent;
            netPayable = netPayable+tmp;
        }
    }
    //*/
    netPayable = Math.floor(netPayable.toFixed(0));
    $('#totalAmount').val(netPayable);
    if(agencyCommissionPercent > 0) {
        tmp=(netPayable/100)*agencyCommissionPercent;
        netPayable=netPayable-tmp;
    }
    if(discount > 0) {
        netPayable=netPayable-discount;
    }
    netPayable = Math.floor(netPayable.toFixed(0));
    $('#netPayable').val(netPayable);
}