document.addEventListener("DOMContentLoaded", function () {

    console.log("le script js est lancé 1 !");
    var $ = jQuery;
    // Cacher le menu burger par défaut
    $('.menu-burger').hide();

    // Gérer le clic sur le bouton de menu
    $('.menu-toggle').click(function() {
        $('.menu-burger').slideDown("slow");
    });


});

document.addEventListener('readystatechange', function (event) {

    console.log("le script js est lancé 2 !");
    if (document.readyState === "complete") {
    // Initialize Swiper
        initSwiperJS()
    // Initialize Skrollr
        initScroll()
    }
});

// slider : SwiperJs 
function initSwiperJS() {
    var swiper = new Swiper('.swiper', {
        slidesPerView: 3,
        spaceBetween: 30,
        speed: 1000,
        loop: true,
        autoplay: {
            delay: 250,
        },

    });
}

// skrollr has been deprecated since 2014
// https://www.dev-tips-and-tricks.com/animate-elements-scrolled-view-vanilla-js
// https://webdesign.tutsplus.com/animate-on-scroll-with-javascript--cms-36671t

var cloud_container;

function getCloudPosition(container) {
    const elementTop = container.getBoundingClientRect().top;
    const elementHeight = container.getBoundingClientRect().elementHeight
    return Math.floor(((window.innerHeight || document.documentElement.clientHeight) - elementTop) / (window.innerHeight || document.documentElement.clientHeight) * 100)
}

function elementInView(el, dividend = 1) {
    const elementTop = el.getBoundingClientRect().top;
    const elementHeight = el.getBoundingClientRect().elementHeight
    return (
        elementTop <=
        (window.innerHeight || document.documentElement.clientHeight) / dividend
    );
}

function handleCloudAnimation() {
    console.log(cloud_container)
    if (elementInView(cloud_container, 1.25)) {
        document.getElementById('big-cloud').style.left = getCloudPosition(cloud_container) + '%'
        document.getElementById('little-cloud').style.left = getCloudPosition(cloud_container) + '%'
    }
}

function initScroll() {
    cloud_container = document.getElementById('cloud-container')
    window.addEventListener('scroll', handleCloudAnimation);
    window.addEventListener('resize', handleCloudAnimation);
    handleCloudAnimation();
}