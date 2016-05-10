<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs) {
     $breadcrumbs->push('Inicio', route('home'));
});