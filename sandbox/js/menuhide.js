$(document).ready(function(){
    $('.dropdown').on('show.bs.dropdown', function(){
        $('header').addClass('hid-carousel');
        $('section').addClass('hid-section');
        $('.nav-curtain').show();
    });
    //$('.dropdown').on('shown.bs.dropdown', function(){
        //alert('The dropdown is now fully shown.');
    //});
    $('.dropdown').on('hide.bs.dropdown', function(e){
        $('header').removeClass('hid-carousel');
        $('section').removeClass('hid-section');
        $('.nav-curtain').hide();

    });
    //$('.dropdown').on('hidden.bs.dropdown', function(){
        //alert('The dropdown is now fully hidden.');
    //});
});