</div>

<footer>
  <div class="content">
    <ul class="rrss">
      <li>
        <a href="https://francisjgarcia.es" target="_blank">
          <img src="/images/fjg.png" alt="FJG" title="FJG">
        </a>
      </li>
      <li>
        <a href="https://github.com/francisjgarcia/" target="_blank">
          <img src="/images/github.png" alt="GitHub" title="GitHub">
        </a>
      </li>
      <li>
        <a href="https://www.linkedin.com/in/francisjgarcia/" target="_blank">
          <img src="/images/linkedin.png" alt="Linkedin" title="Linkedin">
        </a>
      </li>
    </ul>
    <div class="copyright">
        Diseñado por <a href="http://francisjgarcia.es" target="_blank">Francis J. García</a> © <?php echo date("Y"); ?>
    </div>
  </div>
</footer>

<script src="/js/jquery.min.js"></script>
<script src="/js/tether.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/grid.js"></script>
<script src="/js/form.js"></script>
<script src="/js/smoothscroll.js"></script>
<script src="/js/main-text.js"></script>
<script src="/js/top.js"></script>
<script>
$(document).ready(function () {
  $(document).on('click', '.fjg-nav-menu-button', function () {
    $(this).toggleClass('active')
  })
});
</script>
<script type="text/javascript">
$(document).on('ready', function() {
  $('.autoplay').slick({
  slidesToShow: 5,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2500,
   responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });
});
</script>
<script src="/js/aviso.js"></script>
</body>
</html>