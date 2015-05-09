$(function () {
    $('[data-toggle="popover"]').popover();
    $('div.alert').delay(2500).slideUp(300);
    $('.myGrade').each(function(){
        $(this).children().each(function(){
            if ($(this).html() < 60){
                $(this).addClass("notPass");
            }
        });
    });
    $("#sortTable").tablesorter();
});