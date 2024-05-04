document.addEventListener("DOMContentLoaded", function () {

    console.log("le script js est lancé!");

    var $ = jQuery;

    // Cacher le menu burger par défaut
    $('.menu-burger').hide();

    // Gérer le clic sur le bouton de menu
    $('.menu-toggle').click(function () {
        $('.menu-burger').slideDown("slow");
    });

    var prevScrollPosition = 0;
    $(window).scroll(function () {
        var scrollPosition = $(this).scrollTop();

        /* 
        * Parallaxe video et logo
        */
        $('.banner').css('background-position-y', -scrollPosition * 0.5 + 'px');
        // Logo suit le scroll après avoir touché la limite de l'image de fond
        var bannerHeight = $('.banner').outerHeight();
        var logoHeight = $('.logo').outerHeight();
        if (scrollPosition >= bannerHeight - logoHeight) {
            $('.logo').css('top', scrollPosition + 'px');
        } else {
            $('.logo').css('top', '20px'); // Réinitialisation de la position du logo
        }

        /* 
        * acceleration des fleurs pendant le scroll
        */
        // Ajuster la vitesse de rotation en fonction de la position de défilement
        var rotationSpeed = (scrollPosition - prevScrollPosition ) * 7;
        if(rotationSpeed < 0 ) rotationSpeed = -rotationSpeed;
        prevScrollPosition = scrollPosition;
        // Appliquer la nouvelle durée de l'animation
        $(':root').css('--rotation-speed', rotationSpeed + 's');
    });


    
    /* 
    * les evenements de click sur open/close du menu burger et les liens dans le menu
    */

    const menuToggle = document.querySelector('.menu-toggle');
    const menuContent = document.querySelector('.menu-content');
    const siteNavigation = document.querySelector('.main-navigation ');
    const menuNavItems = document.querySelectorAll('.menu-nav-item');

    /* ajouter l'evenement de clic sur le bouton open / close du menu burger */
    menuToggle.addEventListener('click', function () {
        menuToggle.classList.toggle('active');
        menuContent.classList.toggle('open');
        siteNavigation.classList.remove('toggled');
    });

    /* ajouter l'evenement de clic sur le click des item du menu pour fermer le menu burger */
    menuNavItems.forEach(item => {
        item.addEventListener('click', () => {
            menuToggle.classList.remove('active');
            menuContent.classList.remove('open');
        });
    });
    

    /* 
        ajuster l'affichage du menu à l'ecran en ajoutant un scroll au menu
    */
    function adjustMenuHeight() {
        const windowHeight = window.innerHeight;
        menuContent.style.height = (windowHeight - menuContent.offsetTop) + 'px';
    }
    // Appeler la fonction une fois au chargement de la page
    adjustMenuHeight();

    // Appeler la fonction à chaque redimensionnement de la fenêtre
    window.addEventListener('resize', adjustMenuHeight);

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
    if (elementInView(cloud_container, 1.25) && getCloudPosition(cloud_container) < 72) {
        document.getElementById('big-cloud').style.left = getCloudPosition(cloud_container) + '%'
        document.getElementById('little-cloud').style.left = getCloudPosition(cloud_container) + '%'
    }
}

function initScroll() {
    cloud_container = document.getElementById('place')
    window.addEventListener('scroll', handleCloudAnimation);
    window.addEventListener('resize', handleCloudAnimation);
    handleCloudAnimation();
}



/* Pour l'animatin des titres */

// Options pour l'observateur d'intersection
const options = {
    root: null, // Utiliser la fenêtre comme conteneur par défaut
    rootMargin: '0px', // Pas de marge autour de la fenêtre visible
    threshold: 0
};

// Créer un observateur d'intersection
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        // lorsque la section est visible
        if (entry.isIntersecting) {
            entry.target.classList.add('animation-section-visible');
            const title = entry.target.querySelector('.animation-title');
            title.classList.add('animation-title-visible'); 
            observer.unobserve(entry.target); // Arrête d'observer cette section une fois qu'elle est animée
            entry.target.classList.remove("animated-section");
        }
    });
}, options);

// Sélectionner toutes les sections à observer
const sections = document.querySelectorAll('.animated-section');

// Observer chaque section
sections.forEach(section => {
    observer.observe(section);
});

function isElementInViewport(el) {
    const rect = el.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}
