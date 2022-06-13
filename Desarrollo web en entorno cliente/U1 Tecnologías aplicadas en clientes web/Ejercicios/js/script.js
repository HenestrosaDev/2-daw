// Cambia la visibilidad del botón back-top dependiendo de si se está mostrando el top de la páguna
$(function () {
  loadCommonComponents();
  setUpListeners();
  handlePageScroll();
});

const loadCommonComponents = () => {
  $("#sidenav").load(
    "https://lhjc-dwec-tarea1.netlify.app/common/sidenav.html"
  );
  $("#footer").load("https://lhjc-dwec-tarea1.netlify.app/common/footer.html");
  $("#floating-buttons").load(
    "https://lhjc-dwec-tarea1.netlify.app/common/floating-buttons.html",
    function() {
      $("#back-top").on("click", () => {
        backToTop();
      });
    }
  );
};

const setUpListeners = () => {
  document.querySelectorAll("img").forEach((img) => {
    img.addEventListener("click", function () {
      window.open(this.src);
    });
  });
};

const handlePageScroll = () => {
  $(window).on("scroll", function () {
    if ($(this).scrollTop() != 0) {
      $("#back-top").fadeIn();
    } else {
      $("#back-top").fadeOut();
    }
  });
};

// Añade funcionalidad al botón back-top
const backToTop = () => {
  $("html, body").animate(
    {
      scrollTop: 0,
    },
    800
  );
};

// Valida el número introducido en un input de tipo number
export const validateNumber = (element) => {
  if (element.max !== "" && parseFloat(element.value) > element.max) {
    element.value = element.max;
  } else if (element.min !== "" && parseFloat(element.value) < element.min) {
    element.value = "";
  }
};
