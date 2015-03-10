<?php

//ler layout
$file = new File(WWW_ROOT . 'files' . DS . 'layouts' . DS . $pagina['CapturaPagina']['layout'] . DS . 'index.htm');
$layout = $file->read();
$file->close();

$replaces = array();

$replaces["{titulo}"] = $pagina['CapturaPagina']['titulo'];
$replaces["{texto}"] = $pagina['CapturaPagina']['texto'];
$replaces["{formulario}"] = $this->element('captura/formulario');

$layout = str_replace(array_keys($replaces), array_values($replaces), $layout);


//trocar as referencias de arquivo local:
$url = $this->Html->url('/files/layouts/' . $pagina['CapturaPagina']['layout'] . '/');
$layout = preg_replace('/(href|src)="([^"]*)"/', '$1="' . $url . '$2"', $layout);

print $layout;
