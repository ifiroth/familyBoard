const $ = require('jquery');

$(document).ready(() => {
    let element = $( "#content" );

    $.data(element, "languages", ['PHP', 'HTML', 'CSS', 'jQuery']);

    $('#list li').each(function(index) {
        $(this).text($.data(element, "languages")[index])
        console.log(this)
    })

    $('#content').hide(2000).delay(1000).show(2000)
});
