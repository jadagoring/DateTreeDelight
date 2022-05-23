$(document).ready(function() {
    console.log("Works!");
    if(localStorage.getItem('popState') != 'shown'){
        prompt("Test");
        localStorage.setItem('popState','shown')
    }

    $('#popup-close, #popup').click(function(e) // You are clicking the close button
    {
        $('#popup').fadeOut(); // Now the pop up is hiden.
    });
});