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


// Tasas IPC
Breadcrumbs::register('tasas_ipc', function($breadcrumbs) {
    $breadcrumbs->push('Tasas de Índice de Precio al Consumidor', URL::to('ipc'));
});


// Sueldos
Breadcrumbs::register('sueldos', function($breadcrumbs) {
    $breadcrumbs->push('Sueldos de Personal de la Policía Nacional', URL::to('sueldo'));
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
// Show Crear Aportes Afiliado
Breadcrumbs::register('registro_aportes_afiliado', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('show_afiliado', $afiliado);
    $breadcrumbs->push('Registro de Aporte');
});

// Show Crear Aportes Afiliado
Breadcrumbs::register('registro_aportes_afiliado', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('show_afiliado', $afiliado);
    $breadcrumbs->push('Registro de Aporte');
});

// Fondo de Retiro
Breadcrumbs::register('fondo_tramite', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('show_afiliado', $afiliado);
    $breadcrumbs->push('Trámite de Fondo de Retiro');
});

//Aportes Pago
Breadcrumbs::register('aportes_pago', function($breadcrumbs) {
    $breadcrumbs->push('Aportes Voluntarios', URL::to('aportepago'));
});