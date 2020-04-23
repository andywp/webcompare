
 $(document).ready(function() {
    var owl = $('#owl-compare');
    owl.owlCarousel({
    margin: 20,
    nav: true,
    loop: false,
    responsive: {
        0: {
        items: 1
        },
        600: {
        items: 3
        },
        1000: {
        items: 4
        }
    }
    })
})