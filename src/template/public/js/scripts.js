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
    $(this).replaceWith("<div id='loader'><img src='src/template/public/images/ajax-loader.gif'></div>");
    $('#already_registered').hide();


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
                    location.href = "/fwg";
                }, 1500);
                //   console.log(JSON.parse(data)); // show response from the php script.
            }
            else
            {
                $('#loader').replaceWith('<p class="medium">' + JSON.parse(data) + '</h5></p>');
                window.setTimeout(function () {
                    location.href = "registration";
                }, 1500);
                // console.log(JSON.parse(data)); // show response from the php script.
            }

        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.

});

$("#login").submit(function (e) {

    var url = $(this).attr('action');

    $.ajax({
        type: "POST",
        url: url,
        data: $(this).serialize(), // serializes the form's elements.

        success: function (data)
        {
            if ('true' === JSON.parse(data))
            {
                location.href = "/fwg/diary";
//                console.log(JSON.parse(data)); // show response from the php script.
            }
            else
            {
//                console.log(JSON.parse(data)); // show response from the php script.
                $('#loader').replaceWith('<p class="medium">' + JSON.parse(data) + '</h5></p>');
                window.setTimeout(function () {
                    location.href = "";
                }, 1500);
            }

        }
    });
    e.preventDefault(); // avoid to execute the actual submit of the form.

});

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


