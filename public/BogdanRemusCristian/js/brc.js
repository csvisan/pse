// Selectors
const ownerAvatar = document.querySelector('.brc-avatar');
const toChangeFilter = document.querySelectorAll('.brc-filter');
const waves = document.querySelector('.brc-wave');
const showPhoneNumberBtn = document.querySelector('.brc-show-phone');
const phoenContainer = document.querySelector('.brc-phone');

// Events
ownerAvatar.onclick = () => {
  const filters = ['sepia(1)', 'grayscale(1)', ''];
  const filter = getDifferentValue(ownerAvatar.style.filter, filters);
  toChangeFilter.forEach((element) => {
    element.style.filter = filter;
  });
};

showPhoneNumberBtn.onclick = () => {
  const phone = hexToAscii('303732332030383020333839');
  phoenContainer.innerHTML = phone;
  phoenContainer.href = `tel:${phone}`;
  showPhoneNumberBtn.remove();
};

// Helpers
const hexToAscii = (text) => {
  const hex = text.toString();
  let str = '';
  for (let n = 0, length = hex.length; n < length; n += 2) {
    str += String.fromCharCode(parseInt(hex.substr(n, 2), 16));
  }
  return str;
};

const getDifferentValue = (original, options = []) => {
  let newValue = original;
  do {
    newValue = options[Math.floor(Math.random() * options.length)];
  } while (original === newValue);
  return newValue;
};
