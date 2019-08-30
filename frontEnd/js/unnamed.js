// $.noConflict();
$(document).ready(function () {
    $('#country_id').change(function () {
        var c = $(this).find('option:selected').val();
        var id = c.split('-', 1);
        var rate = c.split('-').reverse().join('-').split('-', 1);
        if (c != 'null') {
            var service = $('#service_id');
            service.parent().removeClass('d-none');
            $.get('/getservice/' + id, function (data) {
                service.find('option').remove();
                service.append('<option value="null" selected disabled>Select Services</option>');
                $.each(data, function (index, value) {
                    $('<option>').val(value.id + '-' + value.service_charge).text(value.name).appendTo(service);
                })
            });
        }
        if (c == 'null') {
            var service = $('#service_id').parent();
            service.addClass('d-none');
        }
    });

    $('#service_id').change(function () {
        var s = $(this).children('option:selected').val();
        var id = s.split('-', 1);
        var charge = s.split('-').reverse().join('-').split('-', 1);

        $('#charge').val(charge);
        $('#fees').text('AUD ' + charge);
        var amount = $('#amount').val();
        $('#totalpay').text('AUD ' + addition(amount, charge));

        if (s != 'null') {
            var network = $('#payment_network_id');
            network.parent().removeClass('d-none');
            $.get('/getmethods/' + id, function (data) {
                network.find('option').remove();
                network.append('<option value="null" selected >Select payment method</option>');
                $.each(data, function (index, value) {
                    $('<option>').val(value.id).text(value.name + ' ( fees $' + charge + ' AUD )').appendTo(network);
                })
            });
        }
        if (s == 'null') {
            var network = $('#payment_network_id').parent();
            network.addClass('d-none');
        }
    });

    $('#payment_network_id').change(function () {
        var net = $(this).find('option:selected').val();
        if (net != 'null') {
            var amount = $('#amount');
            amount.parent().parent().parent().removeClass('d-none');
        }
        if (net == 'null') {
            var amount = $('#amount').parent().parent().parent();
            amount.addClass('d-none');
        }
    });

    $('#amount').blur(function () {
        var amount = financial($(this).val());
        if(isNaN(amount)) {

            $(this).val();
            return false;
        }
        if (amount != "null") {
            var country = $('#country_id').find('option:selected').val();
            var service = $('#service_id').find('option:selected').val();
            var charge = service.split('-').reverse().join('-').split('-', 1);
            var rate = country.split('-').reverse().join('-').split('-', 1);
            var total = financial(addition(amount, charge));
            var getAmount = financial(multiply(amount, rate));
            $('#sendAmount').text('AUD ' + amount);
            $('#fees').text('AUD ' + charge);
            $('#totalpay').text('AUD ' + total);
            $('#reciAmount').text('BDT ' + getAmount);
            $('#ftotalpay').val(total);
            $('#freciAmount').val(getAmount);
            $('#exchangeRate').text('BDT ' + rate);

            var showamount = $('#sendAmountInfo');
            showamount.removeClass('d-none');
        }
        if (amount.length === 0) {
            var showamount = $('#sendAmountInfo');
            showamount.addClass('d-none');
        }
    });

    function addition(a = 0, b = 0) {
        return Number(a) + Number(b);
    }

    function multiply(a = 0, b = 0) {
        return Number(a) * Number(b);
    }

    function financial(x) {
        return Number.parseFloat(x).toFixed(2);
    }

    $("#amount").keypress(function(e) {
        var val = $(this).val();
        var regex = /^(\+|-)?(\d*\.?\d*)$/
        if (regex.test(val + String.fromCharCode(e.charCode))) {
            return true;
        }
        return false;
    });
});