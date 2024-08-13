imgs = document.querySelectorAll('.img');
imgClose = document.querySelector('.img-close');
focusImg = document.querySelector('.focus-img');

imgs.forEach(img => {
    img.addEventListener('click', ()=> {
        focusImg.classList.add('focus-img-active');
        //console.log(img.getAttribute('src'));
        focusImg.style.backgroundImage = "url('" + img.getAttribute('src') + "')";
    });
});
imgClose.addEventListener('click', ()=> {
    focusImg.classList.remove('focus-img-active');
});



