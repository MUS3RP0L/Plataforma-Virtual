<?php

// Inicio
Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Inicio', route('home'));
});


// Usuario
Breadcrumbs::register('usuario', function($breadcrumbs) {
    $breadcrumbs->push('Usuarios', URL::to('usuario'));
});
// Crear Usuario
Breadcrumbs::register('crear_usuario', function($breadcrumbs) {
    $breadcrumbs->parent('usuario');
    $breadcrumbs->push('Nuevo Usuario');
});
// Editar Usuario
Breadcrumbs::register('editar_usuario', function($breadcrumbs) {
    $breadcrumbs->parent('usuario');
    $breadcrumbs->push('Editar Usuario');
});


// Tasas de aporte
Breadcrumbs::register('tasas_aporte', function($breadcrumbs) {
    $breadcrumbs->push('Tasas de Aporte', URL::to('tasa'));
});
// Editar Tasas de aporte
Breadcrumbs::register('editar_tasas_aporte', function($breadcrumbs, $mes) {
    $breadcrumbs->parent('tasas_aporte');
    $breadcrumbs->push('Editar '.$mes);
});


// Tasas IPC
Breadcrumbs::register('tasas_ipc', function($breadcrumbs) {
    $breadcrumbs->push('Tasas de Índice de Precio al Consumidor', URL::to('ipc'));
});


// Afiliado Search
Breadcrumbs::register('afiliado', function($breadcrumbs) {
    $breadcrumbs->push('Afiliados', URL::to('afiliado'));
});
// Show Afiliado
Breadcrumbs::register('show_afiliado', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('afiliado');
    $breadcrumbs->push($afiliado->getTittleName(), URL::to('afiliado/'.$afiliado->id));
});
// Show Aportes Afiliado
Breadcrumbs::register('aportes_afiliado', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('show_afiliado', $afiliado);
    $breadcrumbs->push('Aportes');
});

// Show Fondo de Retiro
Breadcrumbs::register('fondo_tramite', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('show_afiliado', $afiliado);
    $breadcrumbs->push('Trámite de Fondo de Retiro', URL::to('tramite_fondo_retiro/'.$afiliado->id));

});
// Show ventanilla
Breadcrumbs::register('ventanilla_fondo_tramite', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('fondo_tramite', $afiliado);
    $breadcrumbs->push('Ventanilla');
});
// Show calificacion Fondo de retiro Afiliado
Breadcrumbs::register('calif_fr_afiliado', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('show_afiliado', $afiliado);
    $breadcrumbs->push('Calificación Fondo de Retiro');
});
// Show calificacion Seguro de vida Afiliado
Breadcrumbs::register('calif_sv_afiliado', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('show_afiliado', $afiliado);
    $breadcrumbs->push('Calificación Seguro de Vida');
});