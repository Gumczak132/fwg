$(document).ready(function () {
    $('#logo').addClass('animated fadeInDown');
    $("input:text:visible:first").focus();
});
$('#username').focus(function () {
    $('label[for="username"]').addClass('selected');
});
$('#username').blur(function () {
    $('label[for="username"]').removeClass('selected');
});
$('#password').focus(function () {
    $('label[for="password"]').addClass('selected');
});
$('#password').blur(function () {
    $('label[for="password"]').removeClass('selected');
});
$("#registration").submit(function (e) {

    var url = $(this).attr('action');
    $(this).replaceWith("<div id='loader'><img src='images/ajax-loader.gif'></div>");
    $('#forget_psw_string').hide();


    $.ajax({
        type: "POST",
        url: url,
        data: $(this).serialize(), // serializes the form's elements.

        success: function (data)
        {
            if ('true' === JSON.parse(data))
            {
                $('#loader').replaceWith('<p class="medium">Registration complteded successfully <br/> <h5>Now you can safely log in!</h5></p>');
                window.setTimeout(function () {
                    location.href = "/fwg/";
                }, 3000);
                console.log(JSON.parse(data)); // show response from the php script.
            }
            else
            {
                $('#loader').replaceWith('<p class="medium">' + JSON.parse(data) + '</h5></p>');
                window.setTimeout(function () {
                    location.href = "registration";
                }, 3000);
                console.log(JSON.parse(data)); // show response from the php script.
            }

        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.

});

function onlyNumbersandSpecialChar(evt) {
    var e = window.event || evt;
    var charCode = e.which || e.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57 || charCode > 107 || charCode > 219 || charCode > 221) && charCode !== 40 && charCode !== 32 && charCode !== 41 && (charCode < 43 || charCode > 46)) {
        if (window.event) //IE
            window.event.returnValue = false;
        else //Firefox
            e.preventDefault();
    }
    return true;

}

//allows only alphabet and numbers! :D!

function isAlfa(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    var ew = event.which;

    // uncomment if u want to allow space
    //  if (ew == 32)   
    //    return true;
    if (48 <= ew && ew <= 57)
        return true;
    if (65 <= ew && ew <= 90)
        return true;
    if (97 <= ew && ew <= 122)
        return true;
    return false;
}


// ob_start i ob_clean


