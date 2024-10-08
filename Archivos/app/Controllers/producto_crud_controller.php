<?php
namespace App\Controllers;
use App\Models\Producto_model;
use CodeIgniter\Controller;

class Producto_crud_controller extends Controller{

	public function index(){
		$ProductoModel = new Producto_model();
		$data['productos']=$ProductoModel ->orderBy('id', 'DESC')->findAll(); 
		$dato ['titulo']='Todos los productos';
        echo view ('front/header', $dato);
		echo view('front/nabvar');
		echo view ('back/productos/Mostrar_producto', $data);
		echo view('front/footer');
	}
	public function create(){
		$ProductoModel =new Producto_model();
		$data ['user_obj']=$ProductoModel ->orderBy('id', 'DESC')->findAll();
		$dato['titulo']='Agrega productos';
		echo view ('front/header', $dato);
		echo view('front/nabvar');
		echo view ('back/productos/Agregar_producto', $data);
		echo view('front/footer');

	}

	public function store(){
		$ProductoModel= new Producto_model;
		$input = $this->validate([
			'nombre_prod' =>'required|min_length[2]',
			'categoria_id'=>'is_not_unique[categorias.id]',
			'precio' =>'required|',
			'precio_vta'=>'required',
			'stock'=> 'required',
			'stock_min'=> 'required',
		]);
		$productoModel= new Producto_model();
		if(!$input){
			$dato['titulo']='Alta';
			echo view ('front/header', $dato);
		    echo view('front/nabvar');
			echo view('back/productos/Agregar_producto',['validation'=>$this->validator]);
		}else{
			$img = $this->request->getFile('imagen');
				$nombre_aleatorio = $img->getRandomName();
				$img->move(ROOTPATH. '/assets/uploads', $nombre_aleatorio);
				$data = [
					'nombre_prod' => $this->request->getVar('nombre_prod'),
					'categoria_id' => $this->request->getVar('categoria_id'),
					'imagen' => $img->getName(),
					'precio'=> $this->request->getVar('precio'),
					'precio_vta' => $this->request->getVar('precio_vta'),
					'stock' => $this->request->getVar('stock'),
					'stock_min' => $this->request->getVar('stock_min'),
					
			];
			
			$productoModel->insert($data);
			return $this->response->redirect(site_url('crear'));
		}
	}

		//update product data
		public function update($id){
			$ProductoModel =new Producto_model();
			//$id=$ProductoModel -> where ('id', $id)->first();
			$data=[
				'nombre_prod'=>$this->request->getVar('nombre_prod'),
				'categoria_id'=> $this->request->getVar('categoria_id'),
				'precio'=>$this->request->getVar('precio'),
				'precio_vta'=>$this->request->getVar('precio_vta'),
				'eliminado'=> $this->request->getVar('eliminado'),
				'stock'=> $this->request->getVar('stock'),
				'stock_min'=>$this->request->getVar('stock_min'),
				

			];
			$ProductoModel->update($id,$data);
		
		return $this->response->redirect(site_url('crear'));
		}
		


		public function eliminar($id = null){
			$ProductoModel =new Producto_model();
			$data ['producto']=$ProductoModel->where('id', $id)->delate($id);
			return $this->response->redirect(site_url('crear')); 
}

// borrar logico de producto
	public function deletelogico($id = null){
		$ProductoModel =new Producto_Model();
		$data ['eliminado']= $ProductoModel ->where('id', $id)->first();
		$data['eliminado']='SI';
		$ProductoModel->update($id, $data);
		return $this->response->redirect(site_url('crear'));
	}

	public function reponer($id = null){
		$ProductoModel =new Producto_Model();
		$data ['eliminado']= $ProductoModel ->where('id', $id)->first();
		$data['eliminado']='NO';
		$ProductoModel->update($id, $data);
		return $this->response->redirect(site_url('crear'));
}
	
	public function singleProducto($id=null){
		$productoModel =new Producto_model();
		$data ['old']=$productoModel ->where('id', $id)->first();
		$dato['titulo']='editar_producto';
		echo view ('front/header', $dato);
		echo view('front/nabvar');
		echo view ('back/productos/editar_producto', $data);
		echo view('front/footer');
	}
}