const hamburger = document.getElementById('hamburger');
const secondNav = document.getElementById('second-nav');

const showNav = () => {
  if(hamburger.src.endsWith('icon-hamburger.svg')) {
    hamburger.src = './icon-close.svg';
  } else {
    hamburger.src = './icon-hamburger.svg';
  }

  secondNav.classList.toggle('show');
}
hamburger.addEventListener('click', showNav);