"use strict";

const URL_LIST = "https://www.thecocktaildb.com/api/json/v1/1/list.php";
const URL_FILTER = "https://www.thecocktaildb.com/api/json/v1/1/filter.php";
const URL_LOOKUP = "https://www.thecocktaildb.com/api/json/v1/1/lookup.php";

$(window).on("load", function () {
	loadCategories();
	loadGlasses();
	loadIngredients();
	loadAlcoholics();
	
	setListeners();
});


// jQuery
const loadCategories = () => {
  $.get(`${URL_LIST}?c=list`, (response) => response.drinksObject)
    .done((drinksObject) => {
      const categories = drinksObject.drinks.sort((a, b) => {
        return a.strCategory.localeCompare(b.strCategory);
      });
      addOptions("categories", categories, "strCategory");
    })
    .fail((error) => console.error(error));
};

// Axios
const loadGlasses = () => {
  axios
    .get(`${URL_LIST}?g=list`)
    .then((response) => response.data.drinks)
    .then((drinks) => {
      const glasses = drinks.sort((a, b) => {
        return a.strGlass.localeCompare(b.strGlass);
      });
      addOptions("glasses", glasses, "strGlass");
    })
    .catch((error) => console.error(error));
};

// Fetch API
const loadIngredients = () => {
  fetch(`${URL_LIST}?i=list`)
    .then((response) => response.json())
    .then((json) => {
      const ingredients = json.drinks.sort((a, b) => {
        return a.strIngredient1.localeCompare(b.strIngredient1);
      });
      addOptions("ingredients", ingredients, "strIngredient1");
    })
    .catch((error) => console.error(error));
};

// XMLHttpRequest
const loadAlcoholics = () => {
  const xhr = new XMLHttpRequest();
  xhr.responseType = "json";

  xhr.open("GET", `${URL_LIST}?a=list`);

  // Manda la petición
  xhr.send();

  // onload se ejecuta cuando recibimos la respuesta del servidor
  xhr.onload = () => {
    if (xhr.status != 200) {
      // Si la respuesta no es 200 (OK) es porque ha habido un error
      console.error(`Error ${xhr.status}: ${xhr.statusText}`);
    } else {
      const alcoholics = xhr.response.drinks.sort((a, b) => {
        return a.strAlcoholic.localeCompare(b.strAlcoholic);
      });
      addOptions("alcoholics", alcoholics, "strAlcoholic");
    }
  };
};

/**
 * Añade opciones a un elemento select determinado.
 *
 * @param {String} parentId  Id del elemento select
 * @param {Array} array   Contiene objetos de los que obtendremos el valor de una de
 * sus propiedades para incluirlo en el select
 * @param {String} property  Contiene el nombre de la propiedad del objeto que vamos
 * a incluir en el select
 */
const addOptions = (parentId, array, property) => {
  const selectElement = document.getElementById(parentId).options;
  array.forEach((el) => selectElement.add(new Option(el[property]))); 
};

/**
 * Añade los listeners del evento "change" a todos los elementos select
 */
const setListeners = () => {
  const categories = $("#categories");
  categories.on("change", function () {
    handleSelectChange(
			`?c=${$(this).val().replace(/ /g, "_")}`, 
			[ingredients, glasses, alcoholics]
		);
  });

  const glasses = $("#glasses");
  glasses.on("change", function () {
    handleSelectChange( 
			`?g=${$(this).val().replace(/ /g, "_")}`,
			[categories, ingredients, alcoholics]
		);
  });

  const ingredients = $("#ingredients");
  ingredients.on("change", function () {
    handleSelectChange(
			`?i=${$(this).val().replace(/ /g, "_")}`, 
			[categories, glasses, alcoholics]
		);
  });

  const alcoholics = $("#alcoholics");
  alcoholics.on("change", function () {
    handleSelectChange(
			`?a=${$(this).val().replace(/ /g, "_")}`, 
			[categories, glasses, ingredients]
		);
  });
};



/**
 * Manejador del evento "change" de los elementos select
 *
 * @param {String} param   Añade el parámetro por el que filtrar
 * @param {Array} elemsToReset  Elementos select cuyo valor se tiene que reiniciar
 */
const handleSelectChange = (param, elemsToReset) => {
  // Div al que vamos a añadir las bebidas
  const drinksElement = $("#drinks");

  // Eliminamos los elementos previos
  drinksElement.empty();

  // Quitamos el filtro del resto de selects
  elemsToReset.forEach((el) => (el.prop('selectedIndex', 0)));

  // Obtenemos las bebidas
  fetch(URL_FILTER + param)
    .then((response) => response.json())
    .then((json) => {
      // Mostramos el número de bebidas que cumplen el filtro
      showResultsNumber(json.drinks.length);

      // Iteramos por cada bebida encontrada y la creamos en el DOM
      json.drinks.forEach((el, idx) => {
        drinksElement.append(
          `<article class="flex justify-center">
            <div class="rounded-lg shadow-lg bg-white max-w-sm">
              <img class="rounded-t-lg" src="${el.strDrinkThumb}" alt="${el.strDrink} image"/>
              <div class="pb-6 px-6 pt-4 text-center">
                <h5 class="text-gray-900 text-xl font-medium mb-2">${el.strDrink}</h5>
                <button 
                  id="ingredients-${idx}"
                  type="button" 
                  class="
                    inline-block 
                    px-6 py-2.5 
                    bg-blue-600 
                    w-full
                    text-white font-medium text-xs leading-tight uppercase 
                    rounded 
                    shadow-md 
                    hover:bg-blue-700 hover:shadow-lg 
                    focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 
                    active:bg-blue-800 active:shadow-lg 
                    transition duration-150 ease-in-out"
                >
                  Ver ingredientes
                </button>
                <input id="drink-${idx}-id" value="${el.idDrink}" type="hidden">
              </div>
            </div>
          </article>`
        );

        // Creamos un listener para el evento "click" sobre el botón con el
        // texto "Ver ingredientes" para mostrar sus ingredientes en un diálogo
        const ingredientsButton = $(`#ingredients-${idx}`);
        ingredientsButton.on("click", () => {
          const idDrink = $(`#drink-${idx}-id`).val();
          // Tras obtener los ingredientes asíncronamente, los mostramos
          getIngredients(`?i=${idDrink}`);
        });
      });
    })
    .catch((error) => console.error(error));
};

/**
 * Obtiene los ingredientes relativos a una bebida
 *
 * @param {Int} id  Bebida a buscar
 */
const getIngredients = (id) => {
	$.get(URL_LOOKUP + id, (response) => response)
    .done((json) => {
      const ingredients = [];
      for (let i = 1; i < 99; i++) {
        const ingredient = json.drinks[0][`strIngredient${i}`];
        if (!ingredient) break;
        ingredients.push(ingredient);
      }
      showIngredients(ingredients);
    })
    .fail((error) => console.error(error));
};

/**
 * Muestra los ingredientes por pantalla
 *
 * @param {Array} ingredients   Ingredientes de la bebida
 */
const showIngredients = (ingredients) => {
  const text = new Intl.ListFormat("es", { type: "conjunction" }).format(
    ingredients
  );

  Swal.fire({
    heightAuto: false,
    icon: "info",
    title: "Ingredientes",
    text: text,
  });
};

/**
 * Diálogo que muestra el número de resultados de nuestra petición
 *
 * @param {Int} results  Número de resultados de la petición
 */
const showResultsNumber = (results) => {
  Swal.fire({
    position: "top",
    icon: "success",
    title: `Se han obtenido ${results} cocktails`,
    showConfirmButton: false,
    timer: 1000,
  });
};
