<section>
<div class="carousel">
    <div class="carousel-slide">
      <img src="/img/1.jpg" alt="Slide 1">
    </div>
    <div class="carousel-slide">
      <img src="/img/1.jpg" alt="Slide 2">
    </div>
    <div class="carousel-slide">
      <img src="/img/1.jpg" alt="Slide 3">
    </div>
  </div>
</section>

<div class="container">
  <section class="conteudo">
    <div>
      <h4>O que temos a oferecer</h4> oferecemos a facilidade e segurança no registro <br> e controle de acesso de visitantes ao condomínio, <br> garantindo mais tranquilidade aos moradores e maior <br> eficiência na gestão do fluxo de pessoas.
    </div>
    <div>
      <h4>cadastre-se</h4> faça já seus visitantes, é gratuito!
    </div>
  </section>
</div>

<script>
    const carousel = document.querySelector('.carousel');
    const slides = carousel.querySelectorAll('.carousel-slide');
    let currentIndex = 0;

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.transform = `translateX(${(i - index) * 100}%)`;
      });
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      showSlide(currentIndex);
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      showSlide(currentIndex);
    }

    setInterval(nextSlide, 5000);
  </script>

