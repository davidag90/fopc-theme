<?php
if (!is_active_sidebar('sidebar-obras-sociales')) {
  return;
}
?>

<div class="col-lg-4 order-first order-lg-last">
  <aside id="secondary" class="widget-area">

    <button class="btn btn-outline-primary w-100 mb-4 d-flex d-lg-none justify-content-between align-items-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar-obras-sociales" aria-controls="sidebar-obras-sociales">
      <?php esc_html_e('Open side menu', 'bootscore'); ?> <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>

    <div class="offcanvas-lg offcanvas-end" tabindex="-1" id="sidebar-obras-sociales" aria-labelledby="sidebarLabel">
      <div class="offcanvas-header bg-light">
        <span class="h5 offcanvas-title" id="sidebarLabel">Más info</span>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebar-obras-sociales" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body flex-column">
        <section id="menu-sidebar-obras-sociales" class="widget card card-body mb-4 text-bg-primary border-0">
          <h2 class="h3 widget-title card-title py-2">Obras Sociales</h2>
          <?php wp_nav_menu(array(
            'container'       => false,
            'theme_location'  => 'sidebar-obras-sociales',
            'menu_class'      => 'list-group list-group-flush bg-transparent',
            'link_before'     => '<i class="fa-solid fa-list fa-2xs me-2"></i>',
            'depth'           => 0
          )); ?>
        </section>
        <?php if(is_page('auditoria-apross')): ?>
        <section id="disclaimer-apross" class="p-4 mb-4 text-bg-primary border-0 rounded">
          <h3><i class="fas fa-circle-exclamation"></i> IMPORTANTE</h3>
          
          <p><strong>APROSS</strong> tiene un <strong>tope de facturación mensual</strong> el cual deberá controlar para no excederse y evitar de esta forma devoluciones.</p>
          <p><strong>Las planillas de Facturación son las que tienen el logo de Apross,</strong> deberán estar completas; controle datos requeridos.</p>
          <p>Todas las <strong>planillas y documentación</strong> referida a Apross podrá encontrarla en su cuenta, en la sección <strong>«Formularios».</strong> </p>
          <p>Cuando el profesional es dado de alta, Fopc le envía un correo con su usuario y clave para el acceso para autorizar prácticas. En caso, de no recibir dicho correo, comunicarse con la Mesa de Entrada de FOPC. <a href="tel:0351-4216051" class="link-light">0351-4216051</a> Int 101.</p>
          <p>Todas las prácticas deberán ser validadas con un <strong>código de gestión</strong> que lo podrá solicitar vía telefónica al <a href="tel:0800-777-777-9" class="link-light">0800-777-777-9</a> o por medio de la pàgina <a href="https://www.traditum.com/NEO%20TDM%20Canal%20IT/View/Login.aspx" class="link-light">www.traditum.com.ar</a> Al momento de obtener código de gestión para facturar corrobore que se corresponda con el afiliado y con las prácticas a facturar.</p>
          <p>Para solicitar autorización de las prácticas de: 04.01.08 (Perno) - 04.01.13 (Corona) 10.99.01 (Tratamiento de ATM) - 06.01/06.03/06.04 (Ortodoncia), se deberá presentar:  RP Membretado (Pedido Medico) completo con datos del paciente, Nombre y Nº de Afiliado, código de la pràctica y <strong>código de gestión.</strong></p>
          <p>Para solicitar autorización de <strong>Tratamiento de Periodoncia:</strong> 08.01/09.01.04/08.03-04, se deberá presentar: RP Membretado (Pedido Medico) completo con datos del paciente, Nombre y Nº de Afiliado, código de la pràctica, <strong>código de gestión</strong>, Ficha Periodontal <em>(podrá encontrarla en Formularios en su cuenta de nuestra Pag. Web) </em>y radiografías seriadas.</p>
          <p>Debe <strong>solicitar garantías de prótesis y placa de relajación antes de facturar</strong> al teléfono de Auditoría de Apross de Fopc Tel: <a href="tel:0351%204280727" class="link-light">0351- 4280727</a> - <a href="tel:4223390%20-%204238035" class="link-light">4223390 - 4238035</a> o vía email a auditoria_apross@fopc.org.ar</p>
          <p><strong>Para refacturar un débito</strong> del cual no se realizó devolución de planilla, deberá confeccionar ficha APROSS nuevamente en forma completa y solicitar nuevo código de gestión.</p>
          <p>Recuerde que para APROSS el código 02.08 se podrá utilizar sólo en el sector anterior. El Código 02.16 comprende sólo el sector posterior de la cavidad bucal.</p>
          <p>Se deberá realizar catastro al momento de facturar el código 01.01 y 07.01. En pacientes de dentición mixta, deberá enunciar elementos ausentes y presentes ya sean piezas dentarias temporarios y permanentes en odontograma de ficha de facturación APROSS.</p>
          <p>En caso que la planilla fuera devuelta desde auditoría para refacturar, deberá reenviar ficha original.</p>
          <p><strong>El plazo estimado para refacturar las prácticas debitadas se corresponde con 45 días.</strong> Superando ese plazo se considerará las prestaciones refacturadas fuera de término.</p>
        </section>
        <?php endif; ?>
        
        <?php dynamic_sidebar('sidebar-obras-sociales'); ?>
      </div>
    </div>
  </aside><!-- #secondary -->
</div>
