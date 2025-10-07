const convenios = document.querySelectorAll("#resumen-convenios .convenio");
const searchBox = document.getElementById("terminos-filtro");
const buttonTodos = document.getElementById("filtra-todos");
const buttonFacOnline = document.getElementById("filtra-faconline");

searchBox.addEventListener("input", buscarConvenio);
buttonTodos.addEventListener("click", mostrarTodos);
buttonFacOnline.addEventListener("click", mostrarFacOnline);

function buscarConvenio() {
  const searchValue = searchBox.value.toLowerCase();

  buttonTodos.classList.add("opacity-50");
  buttonFacOnline.classList.add("opacity-50");

  convenios.forEach((convenio) => {
    const convenioText = convenio.textContent.toLowerCase();

    if (convenioText.indexOf(searchValue) != -1) {
      convenio.classList.add("d-block");
      convenio.classList.remove("d-none");
    } else {
      convenio.classList.add("d-none");
      convenio.classList.remove("d-block");
    }
  });
}

function mostrarTodos() {
  searchBox.value = "";

  this.classList.remove("opacity-50");
  buttonFacOnline.classList.add("opacity-50");

  convenios.forEach((convenio) => {
    convenio.classList.remove("d-none");
    convenio.classList.add("d-block");
  });
}

function mostrarFacOnline() {
  searchBox.value = "";

  buttonTodos.classList.add("opacity-50");
  this.classList.remove("opacity-50");

  convenios.forEach((convenio) => {
    if (
      convenio.classList.contains("fac-online") &&
      convenio.classList.contains("activo")
    ) {
      convenio.classList.remove("d-none");
      convenio.classList.add("d-block");
    } else {
      convenio.classList.add("d-none");
      convenio.classList.remove("d-block");
    }
  });
}
