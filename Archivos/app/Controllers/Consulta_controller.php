<?php
namespace App\Controllers;
Use App\Models\Consulta_model;
use CodeIgniter\Controller;
//db = \Config\Database::connect();


class Consulta_controller extends BaseController{


    public function __construct(){
        helper(['form', 'url']);
    }

    public function agregar_consulta(){
            $consulta_model = new Consulta_model();
            $input = $this->validate([
                'nombre_consulta' =>'required|min_length[3]',
                'apellido_consulta'=>'required|min_length[3]|max_length[25]',
                'email_consulta' =>'required|min_length[4]|max_length[100]|',
                'celular_consulta'=>'required|min_length[3]',
                'mensaje_consulta'=> 'required|min_length[3]|max_length[10]',
            ]);
            $data=[
                // 'id' => $this->request->getPostGet('id'),
                'nombre_consulta' => $this->request->getVar('nombre_consulta'),
                'apellido_consulta' => $this->request->getVar('apellido_consulta'),
                'email_consulta' => $this->request->getVar('email_consulta'),
                'celular_consulta' => $this->request->getVar('celular_consulta'),
                'mensaje_consulta' => $this->request->getVar('mensaje_consulta'),


            ];
            $consulta_model->insert($data);
            return $this->response->redirect(site_url('informacion_de_contacto'));
        }
    public function ver_consulta(){
        $consulta_model = new Consulta_model();
        $data['titulo'] = 'Consultas';
        $data['consultas'] = $consulta_model->orderBy('id_persona','asc')->findAll();
        echo view('front/header',$data);
        echo view('front/nabvar');
        echo view('back/consulta/consulta_vista',$data);
        echo view('front/footer');
    }


    public function contestar($id = null){
        $consulta_model = new Consulta_model();
        $data['estado_consulta']= $consulta_model ->where('id_persona', $id)->first();
        $data['estado_consulta'] = 'SI';
        $consulta_model->update($id,$data);
        return $this->response->redirect(site_url('consulta/'));
    }

}
