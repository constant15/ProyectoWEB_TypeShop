<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Usuario_model;
use App\Models\Producto_Model;
use App\Models\Carrito_model;
// namespace CodeIgniterCart;

class carrito_controller extends BaseController{

public function __construct(){
	helper(['form', 'url', 'cart']);
	$session = session();
	$cart = \Config\Services::cart();
	$cart->contents();

	
	if($cart === null){
		 // fija valores base al no existir carrito
		$cart = [ 'cart_total' => 0,'total_items' => 0];

	}
	log_message('info', 'Cart Class Initialized');


	}

		public function catalogo(){
			$session=session();
			$dato= array('titulo' => 'todos los productos');
			$productoModel= new Producto_Model();
			$data['producto']= $productoModel->orderBy('id', 'ASC')->findAll();

			echo view('front/header', $dato);
			echo view('front/nabvar');
			echo view('back/carrito/catalogo_vista', $data);
			echo view('front/footer');


		}

		public function carroCompra(){
			$session=session();
			$cart =\Config\Services::Cart();

			$productoModel = new Producto_Model();
			$data['producto'] = $productoModel->findAll();
			$data['cart'] = $this->request->getVar('cart');

			$dato = array('tiulo' => 'todos los productos');
			$productoModel= new Producto_Model();
			$data['producto'] = $productoModel->orderBy('id', 'DESC')->findAll();

			echo view('front/header', $dato);
			echo view('front/nabvar');
			echo view('back/carrito/carrito_vista', $data);
			echo view('front/footer');


		}

		public function add(){
	// se agrega la sig linea para llamar al servicio e implemente la funcion cart
			$cart =\Config\Services::Cart();

			$request=\Config\Services::request();
			$cart->insert(array(
				'id'	=>$request->getPost('id'), //id dato recuperado de la tabla
				'qty'	=>1,  //especfica la cantidad de prod que se añaden
				'price'	=>$request->getPost('precio_vta'),
				'name'	=> $request->getPost('nombre_prod'),
		));
			
			return redirect()->back()->withInput();
		}
		

		public function actualizar_carrito(){
			$cart=\Config\Services::Cart();
			$request =\Config\Services::request();
			$cart->update(array(
				'id' => $request->getPost('id'),
				'qty'=> 1,
				'price'=> $request->getPost('precio_vta'),
				'name'=> $request->getPost('nombre_prod'),

			));
			return redirect()->back()->withInput('muestro');
		}

	public function sumarProd(){
	$cart=\Config\Services::cart();
	$producto = $cart->getItem($_GET["id"]);
	$cart->update([
		"rowid" => $_GET["id"],
		"qty" => $producto["qty"]+1
	]);
	return redirect()->route("muestro");
  }

  public function restarProd(){
	$cart=\Config\Services::cart();
	$producto = $cart->getItem($_GET["id"]);
	if($producto["qty"] > 1){
		$cart->update([
			"rowid" => $_GET["id"],
			"qty" => $producto["qty"]-1
		]);
	}
	return redirect()->route("muestro");
}

		public function muestra(){

			helper(['form', 'url', 'cart']);
			$cart=\Config\Services::cart();
			$cart=$cart->contents();
			$dato= array( 'titulo'=> 'Confirmar compra');

			$session= session();
			$nombre =$session->get('nombre');
			$perfil_id= $session->get('perfil_id');
			$email= $session->get('email');

			echo view('front/header', $dato);
			echo view('front/nabvar');
			echo view('back/carrito/carrito_vista');
			echo view('front/footer');
		}
		public function borrar_carrito(){
			$cart=\Config\Services::cart();
			$cart->destroy();
			return $this->response->redirect(site_url(''));
		}

// elimina un producto
	public function eliminar_carrito(){
		$request = \Config\Services::request();
		$cart = \Config\Services::cart();
		$rowid = $request->getPostGet('rowid');
		$cart ->remove($rowid);
		return redirect()->route('muestro');

	}

		// elimina todo el carrito
	public function borrarcarrito(){
		$cart=\Config\Services::cart();
		$cart->destroy();
		return $this->response->redirect(site_url('muestro'));

	}


}