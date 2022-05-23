$(document).ready(function() {
    console.log("Works!");
    if(localStorage.getItem('popState') != 'shown'){
        $("#popup").delay(2000).fadeIn();
        localStorage.setItem('popState','shown')
    }

    $('#popup-close, #popup').click(function(e) // You are clicking the close button
    {
        $('#popup').fadeOut(); // Now the pop up is hiden.
    });
});