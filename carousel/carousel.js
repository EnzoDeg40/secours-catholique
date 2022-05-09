const carousel = document.getElementById('carousel');
const carouselMax = carousel.getElementsByClassName('element').length - 1;
var carouselCount = 0;

function updateCarousel() {
    const current = carousel.getElementsByClassName('element')[carouselCount];
    current.scrollIntoView({ behavior: 'smooth' });
}

function nextCarousel() {
    if (carouselCount < carouselMax) {
        carouselCount++;
    }
    updateCarousel();
}

function prevCarousel() {
    if (carouselCount > 0) {
        carouselCount--;
    }
    updateCarousel();
}

window.addEventListener('resize', function (e) {
    const current = carousel.getElementsByClassName('element')[carouselCount];
    current.scrollIntoView();
});

// NO WOKRING 
/*
window.addEventListener('keydown', function (event) {
    console.log(event.key);
    
    if (event.key == 'ArrowRight') {
        nextCarousel();
    } else if (event.key == 'ArrowLeft') {
        prevCarousel();
    }
});*/