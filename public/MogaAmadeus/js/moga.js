const moga = document.querySelector('#ma-moga');
const mogaContainer = document.querySelector('#ma-moga-container');
const fullName = document.querySelector('aside span');
const background = document.querySelector('#ma-background');
const toggle = document.querySelector('.ma-switch input');

let timer = null
let interval = null

moga.onclick = () => {
  if (timer) {
    clearTimeout(timer);
  }
  if (!mogaContainer.classList.contains('ma-rotate')) {
    mogaContainer.classList.add('ma-rotate');
    timer = setTimeout(() => {
      mogaContainer.classList.remove('ma-rotate');
      clearTimeout(timer);
    }, 2000);
  } else {
    mogaContainer.classList.remove('ma-rotate');
  }
}

fullName.onclick = () => {
  window.open('https://github.com/amadeusmoga', '_blank');
}

toggle.onchange = (e) => {
  if (e.target.checked) {
    background.classList.toggle('ma-scale');
    interval = setInterval(() => {
      background.classList.toggle('ma-scale');
    }, 2000);
  } else {
    clearInterval(interval);
  }
}
