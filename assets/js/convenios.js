const convenios = document.querySelectorAll('#resumen-convenios .convenio');
const searchBox = document.getElementById('terminos-filtro');
const buttonActivos = document.getElementById('filtra-activos');
const buttonInactivos = document.getElementById('filtra-inactivos');
const buttonTodos = document.getElementById('filtra-todos');
const buttonFacOnline = document.getElementById('filtra-faconline');

searchBox.addEventListener('input', buscarConvenio);
buttonActivos.addEventListener('click', mostrarActivos);
buttonInactivos.addEventListener('click', mostrarInactivos);
buttonTodos.addEventListener('click', mostrarTodos);
buttonFacOnline.addEventListener('click', mostrarFacOnline);

function buscarConvenio() {  
  let searchValue = searchBox.value.toLowerCase();

  buttonActivos.classList.add('opacity-50');
  buttonInactivos.classList.add('opacity-50');
  buttonTodos.classList.add('opacity-50');
  buttonFacOnline.classList.add('opacity-50');
  
  console.log(searchValue);

  for (const convenio of convenios) {
    let convenioText = convenio.textContent.toLowerCase();

    if(convenioText.indexOf(searchValue) != -1) {
      convenio.classList.add('d-block');
      convenio.classList.remove('d-none');
    }
    else {
      convenio.classList.add('d-none');
      convenio.classList.remove('d-block');
    }
  }
}

function mostrarTodos() {
  searchBox.value = "";
  
  this.classList.remove('opacity-50');
  buttonActivos.classList.add('opacity-50');
  buttonInactivos.classList.add('opacity-50');
  buttonFacOnline.classList.add('opacity-50');
  
  
  for (const convenio of convenios) {
    convenio.classList.remove('d-none');
    convenio.classList.add('d-block');
  }
}

function mostrarActivos() {
  searchBox.value = "";
  
  buttonTodos.classList.add('opacity-50');
  this.classList.remove('opacity-50');
  buttonInactivos.classList.add('opacity-50');
  buttonFacOnline.classList.add('opacity-50');
  
  for (const convenio of convenios) {
    if (convenio.classList.contains("activo")) {
      convenio.classList.remove('d-none');
      convenio.classList.add('d-block');
    }
    else {
      convenio.classList.add('d-none');
      convenio.classList.remove('d-block');
    }
  }
}

function mostrarInactivos() {
  searchBox.value = "";

  buttonTodos.classList.add('opacity-50');
  buttonActivos.classList.add('opacity-50');
  this.classList.remove('opacity-50');
  buttonFacOnline.classList.add('opacity-50');
  
  
  for (const convenio of convenios) {
    if (convenio.classList.contains("inactivo")) {
      convenio.classList.remove('d-none');
      convenio.classList.add('d-block');
    }
    else {
      convenio.classList.add('d-none');
      convenio.classList.remove('d-block');
    }
  }
}

function mostrarFacOnline() {
  searchBox.value = "";
  
  buttonTodos.classList.add('opacity-50');
  buttonActivos.classList.add('opacity-50');
  buttonInactivos.classList.add('opacity-50');
  this.classList.remove('opacity-50');
  
  for (const convenio of convenios) {
    if (convenio.classList.contains("fac-online") && convenio.classList.contains("activo") ) {
      convenio.classList.remove('d-none');
      convenio.classList.add('d-block');
    }
    else {
      convenio.classList.add('d-none');
      convenio.classList.remove('d-block');
    }
  }
}