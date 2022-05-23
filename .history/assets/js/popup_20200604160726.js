$(document).ready(function() {
    console.log("Works!");
    if(localStorage.getItem('popState') != 'shown'){
        $j("#popup").delay(2000).fadeIn();
        localStorage.setItem('popState','shown')
    }

    $j('#popup-close, #popup').click(function(e) // You are clicking the close button
    {
        $j('#popup').fadeOut(); // Now the pop up is hiden.
    });
});