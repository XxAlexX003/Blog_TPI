(function(){
  const nav = document.querySelector('.nav-inner');
  const btn = document.querySelector('.nav-toggle');
  if(!nav || !btn) return;
  btn.addEventListener('click', ()=> nav.classList.toggle('active'));
})();

(function(){
  document.querySelectorAll('.carousel').forEach((carousel) => {
    const track   = carousel.querySelector('.carousel-track');
    if (!track) return;

    const slides  = Array.from(track.children);
    const prevBtn = carousel.querySelector('.control.prev');
    const nextBtn = carousel.querySelector('.control.next');
    const dotsWrap= carousel.querySelector('.indicators');
    const dots    = dotsWrap ? Array.from(dotsWrap.children) : [];

    let index = Math.max(0, slides.findIndex(s => s.classList.contains('current')));
    if (index === -1) index = 0;

    const goTo = (i) => {
      index = (i + slides.length) % slides.length;
      track.style.transform = `translateX(-${index * 100}%)`;
      slides.forEach((s, si) => s.classList.toggle('current', si === index));
      dots.forEach((d, di) => d.classList.toggle('current', di === index));
    };

    nextBtn && nextBtn.addEventListener('click', () => goTo(index + 1));
    prevBtn && prevBtn.addEventListener('click', () => goTo(index - 1));
    dots.forEach((d, di) => d.addEventListener('click', () => goTo(di)));

    let timer = setInterval(() => goTo(index + 1), 6000);
    carousel.addEventListener('mouseenter', () => clearInterval(timer));
    carousel.addEventListener('mouseleave', () => {
      timer = setInterval(() => goTo(index + 1), 4500);
    });

    let startX = 0;
    track.addEventListener('touchstart', (e) => {
      startX = e.touches[0].clientX;
    }, { passive: true });

    track.addEventListener('touchend', (e) => {
      const dx = e.changedTouches[0].clientX - startX;
      if (Math.abs(dx) > 50) goTo(index + (dx < 0 ? 1 : -1));
    });

    goTo(index);
  });
})();