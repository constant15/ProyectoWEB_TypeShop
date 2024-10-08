<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $dato['titulo']='Home'; 
        echo view('front/header');
        echo view('front/nabvar');
        echo view('front/principal');
        echo view('front/footer');

    }

    public function quienes_somos()
    {
        $dato['titulo']='Quienes Somos'; 
        echo view('front/header');
        echo view('front/nabvar');
        echo view('front/quienessomos');
        echo view('front/footer');

    }

    public function comercializacion()
    {
        $dato['titulo']='Comercialización'; 
        echo view('front/header');
        echo view('front/nabvar');
        echo view('front/comercializacion');
        echo view('front/footer');

    }

    public function informacion_de_contacto()
    {
        $dato['titulo']='Contacto'; 
        echo view('front/header');
        echo view('front/nabvar');
        echo view('front/informacion_de_contacto');
        echo view('front/footer');

    }

    public function terminos_y_usos()
    {
        $dato['titulo']='Terminos y Condiciones'; 
        echo view('front/header');
        echo view('front/nabvar');
        echo view('front/terminos_y_usos');
        echo view('front/footer');

    }
    

}

