const CALLBACK = "b81ba5e4af3691e5227d91cbda562e9bf8b88bb7e8c9a8e3a9938e4feee62f5a";
const API_URL = 'http://syst.restaurantathome.be/api/';
/*const API_PREFIX = "http://localhost/RestaurantAtHomeAPI/";*/
const REDIRECT_URL = window.location.search.replace("?", "").split('=')[1];

$( document ).ready(function() {
    if(typeof(Cookies.get('hash')) != 'undefined') {
        if(typeof(Cookies.get('restoId')) != 'undefined') {
            try {
                if(REDIRECT_URL.length != 0) {
                    window.location.href = '../'+REDIRECT_URL;
                } else {
                    window.location.href = '../../';
                }
            } catch(e) {
                window.location.href = '../../';
            }
        }
    }

    $( "form" ).submit(function(e) {
        e.preventDefault();

        var username = $('form').serializeArray()[0].value;
        var passwd = $.sha256($('form').serializeArray()[1].value);

        setUserHash(passwd, username);
    });

    $(':password').pwstrength({
        ui: {
            showVerdictsInsideProgressBar: true
        }
    });

    /*$('#fb_login_btn').on('click', function(evt) {
        evt.preventDefault();
        FB.login();
    });*/

    // Generate a simple captcha
    /*function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    }

    function generateCaptcha() {
        $('#captchaOperation').html([randomNumber(1, 100), '+', randomNumber(1, 200), '='].join(' '));
    }

    generateCaptcha();

    $('#contactForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-remove',
                validating: 'fa fa-refresh'
            },
            fields: {
                email: {
                    validators: {
                        notEmpty: {
                            message: 'Dit is een verplicht veld'
                        },
                        emailAddress: {
                            message: 'Dit is geen geldig e-mailadres'
                        }
                    }
                },
                password: {
                    enabled: false,
                    validators: {
                        notEmpty: {
                            message: 'Dit is een verplicht veld'
                        }
                    }
                }
            }
        });*/


/*
    $.ajax({
        method: "POST",
        url: API_PREFIX + 'login/'+'thdepauw@hotmail.com/a361f49bee3c15f9691c92506d14361e/0',
        dataType: "jsonp",
        crossDomain: true,
        xhrFields: {
            withCredentials: true
        }
    }).done(function (msg) {
        alert(msg.ack);
        //$('#log').html(msg.ack);
    }).fail(function (jqXHR, textStatus) {
        //console.log(jqXHR);
        alert("Request failed: " + textStatus);
    });*/
});

// This is called with the results from from FB.getLoginStatus().
/*function statusChangeCallback(response) {
    /!*console.log('statusChangeCallback');
    console.log(response);*!/
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
        // Logged into your app and Facebook.
        testAPI();
    } else if (response.status === 'not_authorized') {
        // The person is logged into Facebook, but not your app.
        /!*document.getElementById('status').innerHTML = 'Please log ' +
         'into this app.';*!/
    } else {
        // The person is not logged into Facebook, so we're not sure if
        // they are logged into this app or not.
        /!*document.getElementById('status').innerHTML = 'Please log ' +
         'into Facebook.';*!/
    }
}*/

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
/*function checkLoginState() {
    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });
}*/

/*window.fbAsyncInit = function() {
    FB.init({
        appId      : '1520392451545894',
        cookie     : true,  // enable cookies to allow the server to access
                            // the session
        xfbml      : true,  // parse social plugins on this page
        version    : 'v2.2' // use version 2.2
    });

    // Now that we've initialized the JavaScript SDK, we call
    // FB.getLoginStatus().  This function gets the state of the
    // person visiting this page and can return one of three states to
    // the callback you provide.  They can be:
    //
    // 1. Logged into your app ('connected')
    // 2. Logged into Facebook, but not your app ('not_authorized')
    // 3. Not logged into Facebook and can't tell if they are logged into
    //    your app or not.
    //
    // These three cases are handled in the callback function.

    FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
    });

};*/

// Load the SDK asynchronously
/*(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/nl_BE/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));*/

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
/*function testAPI() {
   /!* console.log('Welcome!  Fetching your information.... ');*!/
    FB.api('/me', function(response) {
        console.log('Successful login for: ' + response.name);
        setUserHash('', response.email);
        /!*document.getElementById('status').innerHTML =
         'Bedankt om in te loggen ' + response.name + '!';*!/
    });
}*/











/*function fb_login(){
    FB.login(function(response) {

        if (response.authResponse) {
            /!*console.log('Welcome!  Fetching your information.... ');*!/
            //console.log(response); // dump complete info
            access_token = response.authResponse.accessToken; //get access token
            user_id = response.authResponse.userID; //get FB UID

            FB.api('/me', function(response) {
                user_email = response.email; //get user email
                // you can store this data into your database
                /!*console.log('user_email: '+user_email);*!/

                $.ajax({
                    method: "POST",
                    url: API_PREFIX + 'login/'+user_email+'/'+null+'/1',
                    dataType: "jsonp",
                    crossDomain: true,
                    xhrFields: { withCredentials: true }
                }).done(function (msg) {
                    if(msg !== false) {
                        if((msg[0].hash).length != 0) {
                            setUserHash(msg[0].hash, user_email);
                            /!*console.log(msg[0].hash);*!/
                            /!*alert('Welkom '+user_email+'\nU bent nu ingelogd met Facebook!');*!/
                        } else {
                            $('input[name="email"]').parent().addClass('has-error');
                            $('#login_danger').removeClass('hidden');
                            $('#login_danger .alert-danger').html('Facebook-gebruiker niet gekend');
                        }
                    } else {
                        $('input[name="email"]').parent().addClass('has-error');
                        $('#login_danger').removeClass('hidden');
                        $('#login_danger .alert-danger').html('Facebook-gebruiker niet gekend');
                    }
                }).fail(function (jqXHR, textStatus) {
                    alert("Login mislukt: " + textStatus);
                });
            });

        } else {
            //user hit cancel button
            console.log('User cancelled login or did not fully authorize.');

        }
    }, {
        scope: 'email'
    });
}

(function() {
    var e = document.createElement('script');
    e.src = document.location.protocol + '//connect.facebook.net/nl_BE/all.js';
    e.async = true;
    document.getElementById('fb-root').appendChild(e);
}());*/

function setUserHash(hash, email) {
    try {
        var settings = {
            "async": true,
            "crossDomain": true,
            url: API_URL + 'login/'+email+'/'+hash+'/0',
            "method": "GET",
            "headers": {
                "content-type": "application/json",
                "Pragma": "no-cache" ,
                "Cache-Control": "no-cache",
                "Expires": 0
            },
            "cache": false,
            "processData": false
        }

        $.ajax(settings).always(function (response) {
            response = JSON.parse(response.responseText.substr(1, response.responseText.length-2));
            console.log(response);

            try {
                switch(response.type) {
                    case "Client":
                        Cookies.set('hash', Base64.encode(response.hash, { expires: 0 }));
                        Cookies.set('username', Base64.encode(response.name+' '+response.surname, { expires: 0 }));
                        window.location.href = '/';
                        break;
                    case "Resto":
                        Cookies.set('hash', Base64.encode(response.hash, { expires: 0 }));
                        Cookies.set('username', Base64.encode(response.name+' '+response.surname, { expires: 0 }));

                        try {
                            if(response.resto.id.length != 0) {
                                Cookies.set('restoId', Base64.encode(response.resto.id, { expires: 0 }));

                                try {
                                    if(REDIRECT_URL.length != 0) {

                                        window.location.href = '/'+REDIRECT_URL;
                                    } else {
                                        window.location.href = '/dashboard';
                                    }
                                } catch(e) {
                                    window.location.href = '/dashboard';
                                }
                            } else {
                                $('#login_danger .alert').text('Er is geen restaurant aan dit account gekoppeld');
                                $('#login_danger').removeClass('hidden');
                            }
                        } catch (err) {
                            $('#login_danger .alert').text('Er is geen restaurant aan dit account gekoppeld');
                            $('#login_danger').removeClass('hidden');
                        }

                        break;
                    default:
                        $('#login_danger .alert').text('Oeps, hier ging iets mis!');
                        $('#login_danger').removeClass('hidden');
                }
            } catch (err) {
                $('#login_danger .alert').text('Ongeldige email of ongeldig paswoord');
                $('#login_danger').removeClass('hidden');
                console.log(err);
            }
        });
    } catch (err) {
        $('#login_danger .alert').text('Oeps, hier ging iets mis!');
        $('#login_danger').removeClass('hidden');
        console.log(err);
    }
}