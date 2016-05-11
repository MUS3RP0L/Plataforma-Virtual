<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs) {
     $breadcrumbs->push('Inicio', route('home'));
});

Breadcrumbs::register('afiliado', function($breadcrumbs) {
     $breadcrumbs->push('Afiliados', URL::to('afiliado'));
});