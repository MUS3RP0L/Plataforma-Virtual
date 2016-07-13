<?php

// Users
Breadcrumbs::register('users', function($breadcrumbs) {
    $breadcrumbs->push('Usuarios', URL::to('user'));
});
// Crear User
Breadcrumbs::register('create_user', function($breadcrumbs) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Nuevo');
});
// Edit User
Breadcrumbs::register('edit_user', function($breadcrumbs) {
    $breadcrumbs->parent('users');
    $breadcrumbs->push('Editar');
});

// Contribution Rate
Breadcrumbs::register('contribution_rates', function($breadcrumbs) {
    $breadcrumbs->push('Tasas de Aporte', URL::to('contribution_rate'));
});

// IPC Rate
Breadcrumbs::register('ipc_rates', function($breadcrumbs) {
    $breadcrumbs->push('Tasas de Índice de Precio al Consumidor', URL::to('ipc_rate'));
});

// Base Wage
Breadcrumbs::register('base_wages', function($breadcrumbs) {
    $breadcrumbs->push('Sueldos de Personal de la Policía Nacional', URL::to('base_wage'));
});

// Monthly Report
Breadcrumbs::register('monthly_reports', function($breadcrumbs) {
    $breadcrumbs->push('Reporte Mensual de Totales', URL::to('monthly_report'));
});

// Affiliates
Breadcrumbs::register('affiliates', function($breadcrumbs) {
    $breadcrumbs->push('Afiliados', URL::to('affiliate'));
});













// Inicio
Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Inicio', route('home'));
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

//Aportes Pago Aportes
Breadcrumbs::register('aportes_pago', function($breadcrumbs) {
    $breadcrumbs->push('Aportes Voluntarios', URL::to('aportepago'));
});

//show Pago Aportes
Breadcrumbs::register('show_aportes_pago', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('show_afiliado', $afiliado);
    $breadcrumbs->push('Aporte Voluntario');
});