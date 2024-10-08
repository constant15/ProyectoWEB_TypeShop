<?php
namespace App\Controllers;
use App\Models\Usuario_model;
use CodeIgniter\Controller;

class usuario_crud_controller extends Controller{

	public function index(){
		$userModel = new Usuario_model();
		$data['users']=$userModel ->orderBy('id_usuario', 'DESC')->findAll(); 
		$dato ['titulo']='Todos los usuarios';
        echo view('front/header',$dato);
        echo view('front/nabvar');
        echo view('back/usuario/crud_usuarios',$data);
        echo view('front/footer');
	}
	public function create(){
		$userModel =new Usuario_model();
		$data ['user_obj']=$userModel ->orderBy('id_usuario', 'DESC')->findAll();
		$dato['titulo']='Alta Usuario';
		echo view ('front/header', $dato);
		echo view('front/nabvar');
		echo view ('back/usuario/agregarUsuario', $data);
		echo view('front/footer');

	}
	public function store(){
		$userModel= new Usuario_model();
		$input = $this->validate([
			'nombre' =>'required|min_length[3]',
			'apellido'=>'required|min_length[3]|max_length[25]',
			'email' =>'required|min_length[4]|max_length[100]|valid_email|is_unique[usuarios.email]',
			'usuario'=>'required|min_length[3]',
			'pass'=> 'required|min_length[3]|max_length[10]',
			'perfil_id'=> 'required',
		]);
		$userModel= new Usuario_model();
		if(!$input){
			$data['titulo']='Modificacion';
			echo view('front/header');
			echo view('front/nabvar');
			echo view('back/usuario/crud_usuarios',['validation'=>$this->validator]);
		}else{
			$data = [
				'nombre'=>$this->request->getVar('nombre'),
				'apellido'=> $this->request->getVar('apellido'),
				'usuario'=> $this->request->getVar('usuario'),
				'email'=>$this->request->getVar('email'),
				'pass'=>password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
				'perfil_id'=>$this->request->getVar('perfil_id'),
			];
			$userModel->insert($data);
			return $this->response->redirect(site_url('userlist'));
		}
	}
		//update user data
		public function update(){
			$userModel =new Usuario_model();
			$id =$this->request->getVar('id_usuario');
			$data=[
				'nombre'=>$this->request->getVar('nombre'),
				'apellido'=> $this->request->getVar('apellido'),
				'usuario'=> $this->request->getVar('usuario'),
				'email'=>$this->request->getVar('email'),
				'pass'=>password_hash($this->request->getVar('pass'), PASSWORD_DEFAULT),
				'perfil_id'=> $this->request->getVar('perfil_id'),

			];
			$userModel->update($id,$data);
			return $this->response->redirect(site_url('userlist'));
		}


		public function delete($id = null){
			$userModel =new Usuario_model();
			$data ['usuario']=$userModel->where('id_usuario', $id)->delete($id);
			return $this->response->redirect(site_url('userlist'));
	}

//Eliminacion logica de usuarios
		public function deletelogico($id = null){
			$userModel =new Usuario_model();
			$data ['baja']= $userModel ->where('id_usuario', $id)->first();
			$data['baja']='SI';
			$userModel->update($id, $data);
			return $this->response->redirect(site_url('userlist'));
	}

	public function restaurar($id = null){
		$userModel =new Usuario_model();
		$data ['baja']= $userModel ->where('id_usuario', $id)->first();
		$data['baja']='NO';
		$userModel->update($id, $data);
		return $this->response->redirect(site_url('userlist'));
}

	public function singleUser($id=null){
		$userModel =new Usuario_model();
		$data ['old']=$userModel ->where('id_usuario', $id)->first();
		$dato['titulo']='modifica';
		echo view ('front/header', $dato);
		echo view('front/nabvar');
		echo view ('back/usuario/modificaUsuario', $data);
		echo view('front/footer');

	}
	
}

