<?php

class FiltroViaje {

    public $hotel;
    public $ciudad;
    public $pais;
    public $fecha_viaje;
    public $duracion;

    // Constructor
    public function __construct($hotel, $ciudad, $pais, $fecha_viaje, $duracion) {
        $this->hotel = $hotel;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->fecha_viaje = $fecha_viaje;
        $this->duracion = $duracion;
    }

    // Método para mostrar información del filtro
    public function mostrarInfo() {
        return "Hotel: {$this->hotel}, Ciudad: {$this->ciudad}, País: {$this->pais}, Fecha: {$this->fecha_viaje}, Duración: {$this->duracion} días";
    }

    // Método para validar fecha
    public function validarFecha() {
        return strtotime($this->fecha_viaje) >= strtotime(date("Y-m-d"));
    }
}

