document.addEventListener('scroll', function() {
  const items = document.querySelectorAll('.timeline-item');
  const windowHeight = window.innerHeight;

  items.forEach(item => {
      const rect = item.getBoundingClientRect();
      if (rect.top < windowHeight - 100) {
          item.classList.add('visible');
      } else {
          item.classList.remove('visible');
      }
  });
});
