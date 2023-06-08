<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iofrm</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="/css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="/css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="/css/iofrm-theme25.css">
</head>
<body>
<div class="form-body">
    <div class="website-logo">
        <a href="index.html">
            <div class="logo">
                <img class="logo-size" src="images/logo-light.svg" alt="">
            </div>
        </a>
    </div>
    <div class="row">
        <div class="img-holder">
            <div class="bg"></div>
            <div class="info-holder">
                <img class="md-size" src="images/graphic7.svg" alt="">
            </div>
        </div>
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    @yield('form-content')
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/cleave.min.js"></script>
<script src="/js/main.js"></script>

<script>
    // credit card
    var cleaveCreditCard = new Cleave(".input-credit-card", {
        creditCard: true,
        onCreditCardTypeChanged: function(type) {
            type = type.split("15")[0];
            $('.input-with-ccicon #ccicon').removeClass();
            if(type!="unknown"){
                if(type=="diners"){
                    $('.input-with-ccicon #ccicon').addClass('fab fa-cc-diners-club');
                }else{
                    $('.input-with-ccicon #ccicon').addClass('fab fa-cc-'+type);
                }
            }
        }
    });
</script>
</body>
</html>
