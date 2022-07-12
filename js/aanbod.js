$(document).ready(function () {
    $(document).scroll(function() {
        checkOffset();
    });
    function checkOffset() {
        if($('.big-sort').offset().top + $('.big-sort').height() >= $('#footer').offset().top){
            $('.big-sort').css('position', 'absolute');
        }
        if($(document).scrollTop() + window.innerHeight < $('#footer').offset().top){
            $('.big-sort').css('position', 'fixed');
        }
    }

    let car_id;

    $('.info-arrow').click(function () {
        car_id = $(this).parent().children('.id').text();
        document.location.href = '/aanbod.php' + '?id=' + car_id;
    });
    $('.back').click(function () {
        car_id = '';
        document.location.href = '/aanbod.php';
    });
    $('#finance-container div').click(function(){
        document.location.href = '/contact.php';
    });
    $('.oa-item h2').click(function () {
        $(this).parent().children('.options-stuff').children('.stuff-and-things').toggleClass('hidden');
        $(this).children('.chevron-right').toggleClass('chevron-left');
    });

    let slides = $('.car-img-slide');

    $('.acr').click(function(){
        slides = $('.car-img-slide');
        slides.last().after(slides.first());
        clearInterval(interval);
    });
    $('.acl').click(function(){
        slides = $('.car-img-slide');
        slides.first().before(slides.last());
        clearInterval(interval);
    });
    let interval = setInterval(function() {
        slides = $('.car-img-slide');
        slides.last().after(slides.first());
    }, 2000);
    $('.car-img-slide, #car-img').click(function(){
        clearInterval(interval);
        $(document.body).css('overflow', 'hidden');
        $('.solo-car').css('opacity', '0.1');
        $('.gallery-container').css('display', 'block');
    });
    $('#hamburger').click(function(){
        if($('.gallery-container').is(':visible')){
            $(document.body).css('overflow', 'hidden');
        }
    });
    $('.gallery-close').click(function(){
        $(document.body).css('overflow', 'auto');
        $('.solo-car').css('opacity', '1');
        $('.gallery-container').css('display', 'none');
    });
});