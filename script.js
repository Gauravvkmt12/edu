// document.addEventListener('DOMContentLoaded', () => {
//     const counters = document.querySelectorAll('.counter');
//     counters.forEach(counter => {
//         const updateCounter = () => {
//             const target = +counter.getAttribute('data-target');
//             const count = +counter.innerText;
//             const increment = target / 200;
            
//             if (count < target) {
//                 counter.innerText = `${Math.ceil(count + increment)}`;
//                 setTimeout(updateCounter, 10);
//             } else {
//                 counter.innerText = target;
//             }
//         };
//         updateCounter();
//     });
// });
document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const updateCounter = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const increment = target / 200;

                    if (count < target) {
                        counter.innerText = `${Math.ceil(count + increment)}`;
                        setTimeout(updateCounter, 10);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCounter();
                counter.parentElement.classList.add('animate__fadeInUp');
            }
        });
    }, { threshold: 0.1 });

    counters.forEach(counter => {
        observer.observe(counter);
    });
});







window.addEventListener('load', function() {
    document.querySelector('.dots-container').style.display = 'none';
    document.getElementById('content').style.display = 'block';
});
var swiper = new Swiper('.mySwiper', {
    slidesPerView: 3,
    spaceBetween: 30,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        576: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        768: {
            slidesPerView: 2,
            spaceBetween: 20
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 30
        }
    }
});