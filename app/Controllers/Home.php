<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['titulo'] = 'Red Bull Racing';
        $data['page_origin'] = 'index';

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/form_view', $data);
        echo view('front/principal');
        echo view('front/footer_view');
    }

    public function monoplaza()
    {
        $data['titulo'] = 'Monoplaza';
        $data['page_origin'] = 'monoplaza';

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/form_view', $data);
        echo view('front/monoplaza');
        echo view('front/footer_view');
    }

    public function pilotos()
    {
        $data['titulo'] = 'Pilotos';
        $data['page_origin'] = 'pilotos';

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/form_view', $data);
        echo view('front/pilotos');
        echo view('front/footer_view');
    }

    public function contacto()
    {
        $data['titulo'] = 'Contacto';
        $data['page_origin'] = 'contacto';

        echo view('front/head_view', $data);
        echo view('front/navbar_view');
        echo view('front/form_view', $data);
        echo view('front/contacto');
        echo view('front/footer_view');
    }
}
