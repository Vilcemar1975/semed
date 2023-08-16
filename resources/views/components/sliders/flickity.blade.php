<div class="main-carousel" data-flickity='{ "autoPlay": true }'>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
    <div class="carousel-cell"></div>
</div>

<script>
    var elem = document.querySelector('.main-carousel');
    var flkty = new Flickity( elem, {
    // options
    cellAlign: 'left',
    contain: true
    });

    // element argument can be a selector string
    //   for an individual element
    var flkty = new Flickity( '.main-carousel', {
    // options
    });
</script>
