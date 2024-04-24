document.addEventListener("DOMContentLoaded", function () {

    console.log("le script js est lancé 1 !");
    var $ = jQuery;
    // Cacher le menu burger par défaut
    $('.menu-burger').hide();

    // Gérer le clic sur le bouton de menu
    $('.menu-toggle').click(function () {
        $('.menu-burger').slideDown("slow");
    });


});


document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuContent = document.querySelector('.menu-content');
    const siteNavigation = document.querySelector('.main-navigation ');

    /* 
       ajouter l'evenement de clic sur le bouton open / close du menu burger
    */
    menuToggle.addEventListener('click', function () {
        menuToggle.classList.toggle('active');
        menuContent.classList.toggle('open');
        siteNavigation.classList.remove('toggled');
    });

    /* 
        ajuster l'affichage du menu à l'ecran en ajoutant un scroll au menu
    */
    function adjustMenuHeight() {
        const windowHeight = window.innerHeight;
        menuContent.style.maxHeight = (windowHeight - menuContent.offsetTop) + 'px';
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
    console.log(cloud_container)
    if (elementInView(cloud_container, 1.25)) {
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
    root: null, // Utilisez la fenêtre comme conteneur par défaut
    rootMargin: '0px', // Pas de marge autour de la fenêtre visible
    threshold: 0.5 // Lorsque 50% de la section est visible
};

// Créer un observateur d'intersection
const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const title = entry.target.querySelector('.animation-title');
            title.classList.add('animation-title-visible'); // Ajoute la classe "animation-title-visible" lorsque la section est visible
            observer.unobserve(entry.target); // Arrête d'observer cette section une fois qu'elle est animée
        }
    });
}, options);

// Sélectionnez toutes les sections à observer
const sections = document.querySelectorAll('.animated-section');

// Observer chaque section
sections.forEach(section => {
    observer.observe(section);
});