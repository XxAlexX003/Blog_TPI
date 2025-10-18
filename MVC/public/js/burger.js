(function(){
  const nav = document.querySelector('.nav-inner');
  const btn = document.querySelector('.nav-toggle');
  if (!nav || !btn) return;

  btn.addEventListener('click', () => {
    nav.classList.toggle('active');
  });
})();
