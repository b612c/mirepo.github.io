// new DataTable('.table');
  // document.addEventListener("DOMContentLoaded", function () {
  //   // selecciona todos los modales generados dinámicamente
  //   document.querySelectorAll(".modal").forEach(modal => {
  //     if (modal.parentNode !== document.body) {
  //       document.body.appendChild(modal); // los mueve al final del body
  //     }
  //   });
  // });

document.addEventListener("DOMContentLoaded", function () {
  // escucha todos los modales
  document.querySelectorAll(".modal").forEach(modal => {
    modal.addEventListener("show.bs.modal", function () {
      if (modal.parentNode !== document.body) {
        document.body.appendChild(modal); // mover solo cuando se va a abrir
      }
    });
  });
});


$(window).on('load', () => {

    $('.table').DataTable({
      language: {
        decimal: '',
        emptyTable: 'No hay información',
        info: 'Mostrando _START_ a _END_ de _TOTAL_ Entradas',
        infoEmpty: 'Mostrando 0 to 0 of 0 Entradas',
        infoFiltered: '(Filtrado de _MAX_ total entradas)',
        infoPostFix: '',
        thousands: ',',
        lengthMenu: 'Mostrar _MENU_ Entradas',
        loadingRecords: 'Cargando...',
        processing: 'Procesando...',
        search: 'Buscar:',
        zeroRecords: 'Sin resultados encontrados',
        paginate: {
          first: '«',
          last: '»',
          next: '>',
          previous: '<',
        },
      },
      columnDefs: [{
        className: 'dtr-control arrow-right',
        orderable: false,
        target: -1,
      }, ],
      responsive: {
        details: {
          type: 'column',
          target: -1,
        },
      },
    });
  })
  
function err(mess = '') {
  let params = new URLSearchParams(location.search)
  p = params.get('pg')
  if (mess) {
    mess = '<strong style="color: #832626">Error:</strong> ¡' + mess + '!'
    document.getElementById('err').innerHTML = mess
    document.getElementById('err').style.display = "block"
    setTimeout(function () {
      location.href = `home.php?pg=${p}`;
    }, 5000);
  } else {
    document.getElementById('err').innerHTML = ''
    document.getElementById('err').style.display = "None"
  }
}

function val(){
  let pass = document.getElementById('pass').value
  let pass2 = document.getElementById('pass2').value
  let pass_ms = document.getElementById('pass_ms')
  let mes = ''
  
  if(pass != "" && pass2 != ""){
    if(pass == pass2){
      mes = "Las contraseñas coinciden";
      pass_ms.style.color = "#2bcf00";
      document.getElementById('updt_pass').removeAttribute("disabled")
      // document.getElementById('updt_pass').setAttribute("disabled", "false")
    } else {
      mes = "Las contraseñas no coinciden";
      pass_ms.style.color = "#f00";
      document.getElementById('updt_pass').setAttribute("disabled", "true")
    }
  } else {
    document.getElementById('updt_pass').setAttribute("disabled", "true")
  }
	pass_ms.innerHTML = mes;

}

function darkMode(){
  let toggle__dark = document.getElementById('toggle__dark');
  let dar_mode = document.getElementById('dark-mode');
  toggle__dark.addEventListener("click", (event)=>{
    let check = event.target.checked;
    if (check == true) {
      document.body.classList.add('dark');
      // dar_mode.style.transform = 'rotate(180deg)'
    } else {
        document.body.classList.remove('dark');
        // dar_mode.style.transform = 'rotate(0deg)'
    }
  })

}

$(document).ready(function () {
	const x = document.getElementById('toggle__menu_cerrar');
	const toggle__menu = document.getElementById('toggle__menu');

  var $menu = $('#menu');
  var $body = $('body');

	$(toggle__menu).click(function () {

    if($menu.parent().is("body") === false){
      $body.append($menu);
    }
    $body.addClass("no_scroll");

		$menu.toggle();
		if ($(x).hasClass('ocult__form')) {
      $(x).removeClass('ocult__form').addClass('mos__form');
      $(toggle__menu).removeClass('mos__form').addClass('ocult__form');
		}
	});

	$(x).click(function () {
    $menu.toggle();
		if ($(toggle__menu).hasClass('ocult__form')) {
      $(toggle__menu).removeClass('ocult__form').addClass('mos__form');
			$(x).removeClass('mos__form').addClass('ocult__form');
		}
    $body.removeClass("no_scroll");
	});
});