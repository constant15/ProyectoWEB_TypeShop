<?php
namespace App\Controllers;
use CodeIgniter\Controller;
Use App\Models\Usuario_model;

class Login_controller extends Controller{

    public function index()
    {
        helper(['form','url']);

        $data['titulo']='login'; 
        echo view('front/header',$data);
        echo view('front/nabvar');
        echo view('back/login/login'); 
        echo view('front/footer');
    }
    public function auth(){
        $session = session();
        $model = new Usuario_model();
        //traemos los datos del formulario
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('pass');

        $data= $model->where('email',$email)->first();
        if($data){
            $pass = $data['pass'];
                $ba= $data['baja'];
                if ($ba == 'SI'){
                    $session->setFlashdata('msg', 'Usuario dado de baja!');
                    return redirect()->to('/login_controller');
                }
            $pass = $data ['pass'];
            $verify_pass=password_verify($password, $pass);
            if($verify_pass){
                $ses_data = [
                    'id_usuario' => $data['id_usuario'],
                    'nombre' => $data['nombre'],
                    'apellido' => $data['apellido'],
                    'email' => $data['email'],
                    'usuario' => $data['usuario'],
                    'perfil_id' => $data['perfil_id'],
                    'logged_in' => TRUE ,
                ];
                $session->set ($ses_data);
                //si el perfil es = a 1, es administrador; si es = a 2, es cliente 
                switch (session('perfil_id')){
                    case '1':
                        return redirect()->to('consulta');
                        break;
                    case '2':
                        return redirect()->to('todos_p');
                        break;
                    }
                //return redirect()->to('/');
            }else{
                $session->setFlashdata ('msg', 'Contraseña incorrecta!');
                return redirect()->to('/login_controller');
            }

        }else{
            $session->setFlashdata('msg', 'Email incorrecto!');
            return redirect()->to('/login_controller');
        }
    }
    public function logout(){
        $session =session();
        $session->destroy();
        return redirect()->to('/');
        
    }

    
}