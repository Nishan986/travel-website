let menu = document.querySelector('menu-btn');
let navbar = document.querySelector('.header .navbar');

menu.onclick = () =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

window.onscroll= () =>{
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}
document.querySelectorAll('service-card').forEach(card => {
    card.addEventListener('click', () => {
        alert(`You clicked on ${card.querySelector('h3').textContent}`);
    });
});

var swiper = new Swiper('.home-slider', {
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: {
      delay: 5000,
    },
});

var swiper = new Swiper('.reviews-slider', {
    loop: true,
    spaceBetween: 20,
    autoHeight: true,
    grabCursor: true,
    breakpoints: {
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
    autoplay: {
      delay: 5000,
    },
  });
  

