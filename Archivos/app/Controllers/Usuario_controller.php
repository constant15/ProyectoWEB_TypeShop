<?php
namespace App\Controllers;
Use App\Models\Usuario_model;
use CodeIgniter\Controller;

class usuario_controller extends Controller{

public function __construct(){
          helper(['form', 'url']);

	}
    public function create() {
        
        $dato['titulo']='Registro'; 
        echo view('front/header',$dato);
        echo view('front/nabvar');
        echo view('back/usuario/registrarse');
        echo view('front/footer');
      }

    public function formValidation() {
            $input = $this->validate([
            'nombre'   => 'required|min_length[3]',
            'apellido' => 'required|min_length[3]|max_length[25]',
            'email'    => 'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'usuario'  => 'required|min_length[3]',
            'pass'     => 'required|min_length[3]|max_length[10]'
        ]);
        
        $formModel = new Usuario_model();
            if (!$input) {
              $data['titulo']='Registro'; 
                echo view('front/header',$data);
                echo view('front/nabvar');
                //echo view('back/usuario/registrarse', ['validation' => $this->validator]);
                echo view('back/usuario/registrarse', ['validation' => $this->validator]);
                echo view('front/footer');
          } else {
            $formModel->save([
                'nombre' => $this->request->getVar('nombre'),
                'apellido'=> $this->request->getVar('apellido'),
                'email'=> $this->request->getVar('email'),
                'usuario'=> $this->request->getVar('usuario'),
                'pass' => password_hash($this->request->getVar('pass'), PASSWORD_BCRYPT), 
                'perfil_id' => 2,
              //  password_hash() crea un nuevo hash de contraseña usando un algoritmo de hash de único sentido.
            ]);  
              //return $this->response->redirect(site_url(''));

            // Flashdata funciona solo en redirigir la función en el controlador en la vista de carga.
              session()->setFlashdata('success', 'Usuario registrado con exito!');
              return $this->response->redirect(site_url('registrarse'));
      
        }
    }
}