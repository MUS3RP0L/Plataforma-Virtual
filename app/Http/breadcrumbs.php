<?php

// Inicio
Breadcrumbs::register('home', function($breadcrumbs) {
    $breadcrumbs->push('Inicio', route('home'));
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

// Show Aportes Afiliado
Breadcrumbs::register('calif_sv_afiliado', function($breadcrumbs, $afiliado) {
    $breadcrumbs->parent('show_afiliado', $afiliado);
    $breadcrumbs->push('Calificación Fondo de Retiro');
});