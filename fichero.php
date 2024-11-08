<?php
class Fichero {
    private $contenido = [];
    private $detalles = [];
    private $imagen = [];

    public function __construct($idioma) {
        $filename = $idioma == 'en' ? 'categorias_en.txt' : 'categorias_es.txt';
        if (file_exists($filename)) {
            foreach (file($filename, FILE_IGNORE_NEW_LINES) as $line) {
                list($producto, $detalle, $imagen) = explode('|', $line);
                $this->contenido[] = $producto;
                $this->detalles[$producto] = $detalle;
                $this->imagen[$producto] = $imagen;
            }
        } else {
            $this->contenido = ['Archivo de categorías no encontrado.'];
        }
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getDetalle($producto) {
        return isset($this->detalles[$producto]) ? $this->detalles[$producto] : 'Detalles no disponibles.';
    }

    public function getImagen($producto) {
        return isset($this->imagen[$producto]) ? $this->imagen[$producto] : 'Imagen no disponible.';
    }
}
