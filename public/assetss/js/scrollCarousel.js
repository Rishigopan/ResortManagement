const slider = document.querySelector('.attractnCarousel');
const slideParent = document.getElementById('scrollCarouselNew');
const sliderItem = document.querySelector('.itemScollCarousel');
let isDown = false;
let startX;
let scrollLeft;
let boolToRight = true;

function myMouseMoveEvent(e) {
    if (!isDown) return;  // stop the fn from running
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 2;
    slider.scrollLeft = scrollLeft - walk;
    // console.log(slider.scrollLeft);
}

function myMouseScrollStart(e) {
    isDown = true;
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
}

slider.addEventListener('mousedown', myMouseScrollStart);
slider.addEventListener('mouseleave', () => isDown = false);
slider.addEventListener('mouseup', () => isDown = false);
slider.addEventListener('mousemove', myMouseMoveEvent);
//   touchEvents
slider.addEventListener('touchstart', myMouseScrollStart);
slider.addEventListener('touchend', () => isDown = false);
slider.addEventListener('touchcancel', () => isDown = false);
slider.addEventListener('touchmove', myMouseMoveEvent);

setInterval(() => {
    scrollAutoSetCarousel();
    console.log(slider.lastElementChild.getBoundingClientRect().right,
        slider.firstElementChild.getBoundingClientRect().left,
        slider.clientWidth);
    if (slider.lastElementChild.getBoundingClientRect().right - 100 < slider.clientWidth ||
        slider.firstElementChild.getBoundingClientRect().left > 0) {
        boolToRight = !boolToRight;
    };
}, 3000);

function scrollAutoSetCarousel() {
    scrollAmount = 0;
    var slideTimer = setInterval(function () {
        if (boolToRight) {
            slider.scrollLeft += 10;
        } else {
            slider.scrollLeft -= 10;
        }
        scrollAmount += 10;
        if (scrollAmount >= sliderItem.clientWidth) {
            window.clearInterval(slideTimer);
        }
    }, 25);
}


const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('showAnime');
        } else {
            entry.target.classList.remove('showAnime');
        }
    })
});

const hiddenElements = document.querySelectorAll('.hideAnime');
hiddenElements.forEach(e => observer.observe(e));