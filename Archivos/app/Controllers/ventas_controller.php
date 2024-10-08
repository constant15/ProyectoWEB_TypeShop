<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Producto_Model;
use App\Models\Usuario_model;
use App\Models\vcabecera_model;
use App\Models\vdetalle_model;

class ventas_controller extends BaseController
{
    private $session;

    public function __construct()
    {
        helper(['form', 'url']);
        $db = \Config\Database::connect();
        
    }

    public function compra()
    {
        $venta = new vcabecera_model();
        $detalle = new vdetalle_model();
        $producto = new Producto_model();
        $cart = \Config\Services::cart();
        $request = \Config\Services::request();

        $data = array(
            'id_cliente' => session('id_usuario'),
            'fecha_venta' => date('y-m-d'),
            'total_venta' => $cart->total(),
        );
        
        $cart1 = $cart->contents();

        foreach ($cart1 as $item) {
            $productoStock = $producto->where('id', $item['id'])->first();
            if ($item['qty'] <= $productoStock['stock']) {
            $venta_id = $venta->insert($data);
            $detalleVenta = array(
                'id_venta' => $venta_id,
                'id_producto' => $item['id'],
                'detalle_cantidad' => $item['qty'],
                'detalle_precio' => $item['price'],
                'total' => $cart->total()
            );
                $data = [
                    'stock' => $productoStock['stock'] - $item['qty'],
                ];
                
                $producto->update($item['id'], $data);
                $detalle->insert($detalleVenta);
                $cart->destroy();
                return redirect()->route('exitoComp');

            } else {
                echo 'no hay stock del producto id: ' . $item['id'];
                return redirect()->route('compra_rechaz');

            }


        }

    }



    public function exitoCompra(){
        $data['titulo'] = 'Venta';
        return view('front/header', $data) . view('front/nabvar') . view('back/carrito/exitoCompra', ) . view('front/footer');
    }

    public function rechazada_compra(){
        $data['titulo'] = 'Venta';
        return view('front/header', $data) . view('front/nabvar') . view('back/carrito/compra_rechazada', ) . view('front/footer');
    }



    public function listar_ventas(){
        $ventas_cabecera = new vcabecera_Model();
        $ventas = $ventas_cabecera->select("*")->join('usuarios', 'usuarios.id_usuario = ventas_cabecera.id_cliente')->findAll();
        $data['titulo'] = 'Lista de Ventas';
        $data['ventas_cabecera'] = $ventas;
        echo view('front/header',$data);
        echo view('front/nabvar');
        echo view('back/productos/listar_ventas');
        echo view('front/footer');
    }

    public function listar_detalles(){
        $ventas_detalle = new vdetalle_Model();
        $id= $this->request->getGet('id');
        $ventas = $ventas_detalle->select("*")->join('productos', 'productos.id = ventas_detalle.id_producto')->where('id_venta', $id)->findAll();
        $data['titulo'] = 'Lista de Detalles';
        $data['ventas_detalle'] = $ventas;
        echo view('front/header',$data);
        echo view('front/nabvar');
        echo view('back/productos/listar_detalles');
        echo view('front/footer');
    }

    public function lista_compras(){
        $compra = new vdetalle_Model();
        $detalle = $compra->select("*")
            ->join('productos', 'productos.id = ventas_detalle.id_producto')
            ->join('ventas_cabecera', 'ventas_cabecera.id = ventas_detalle.id_venta')->where('id_cliente', session()->id_usuario)->findAll();
        $data['titulo'] = 'Mis Compras';
        $data['detalles'] = $detalle;
        echo view('front/header', $data);
        echo view('front/nabvar');
        echo view('back/usuario/listar_compras');
        echo view('front/footer');
    }
}
