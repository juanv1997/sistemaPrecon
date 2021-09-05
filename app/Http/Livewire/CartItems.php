<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartItems extends Component
{

    public $listeners = ['productToCart'=>'addItem'];
    public $products = array();
    public $test = 'test';


    public function addItem($cod,$descrip,$precio,$image,$id){

        $proExists = false;

       if(!empty($this->products)){

            foreach ($this->products as $product => $info){

                $cantidadProduct = $info['cantidad'];

                if($id == $info['id']){

                    $info['cantidad'] = $cantidadProduct+1;

                    $proExists = true;

                }

            }
       }

       if(!$proExists){

            $product = array('id'=>$id,
                    'codigo'=>$cod,
                    'descrip'=>$descrip,
                    'precio'=>$precio,
                    'image_path'=>$image,
                    'cantidad'=>1);

            array_push($this->products,$product);
        }
    }


    public function clearCart(){

        unset($this->products);

    }

    public function render()
    {
        return view('livewire.cart-items');
    }
}
