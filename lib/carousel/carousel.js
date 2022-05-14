const carousel = document.getElementById('carousel');
const carouselMax = carousel.getElementsByClassName('element').length - 1;
var carouselCount = 0;

function updateCarousel() {
    const current = carousel.getElementsByClassName('element')[carouselCount];
    current.scrollIntoView({ behavior: 'smooth' });

    if (carouselCount == 0) {
        imgsViewerPC.getElementsByClassName('previous')[0].style.backgroundColor = '#993d2b';
    } else {
        imgsViewerPC.getElementsByClassName('previous')[0].style.backgroundColor = '';
    }

    if(carouselCount == carouselMax) {
        imgsViewerPC.getElementsByClassName('next')[0].style.backgroundColor = '#993d2b';
    } else {
        imgsViewerPC.getElementsByClassName('next')[0].style.backgroundColor = '';
    }
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