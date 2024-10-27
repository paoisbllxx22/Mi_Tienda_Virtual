<?php
class Fichero {
    private $contenido = [];

    public function __construct($idioma) {
        $filename = $idioma == 'en' ? 'categorias_en.txt' : 'categorias_es.txt';
        if (file_exists($filename)) {
            $this->contenido = file($filename, FILE_IGNORE_NEW_LINES);
        } else {
            $this->contenido = ['Archivo de categorías no encontrado.'];
        }
    }

    public function getContenido() {
        return $this->contenido;
    }
}
?>
