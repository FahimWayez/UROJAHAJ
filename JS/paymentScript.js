const bankForm = document.forms["bankForm"];
const wrapper = document.querySelector('.wrapper');
const buttonPopup = document.querySelector('.bankPopup');
const buttonPopup2 = document.querySelector('.bKashPopup');

buttonPopup.addEventListener('click', () => {
    wrapper.classList.remove('active');
    wrapper.classList.add('active-popup');
    wrapper.classList.remove('active-popup2');
})
buttonPopup2.addEventListener('click', () => {
    wrapper.classList.add('active');
    wrapper.classList.remove('active-popup');
    wrapper.classList.add('active-popup2');
})