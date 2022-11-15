<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Delivery;
use App\Models\Client;
use App\Models\User;
use App\Models\Product;
use App\Models\Factory;

class DeliveriesController extends Controller
{
    //

    public function index() {
        $Deliveries = Delivery::join('clients', 'clients.id', '=', 'deliveries.client')
        ->join('users', 'users.id', '=', 'deliveries.deliverer')
        ->select('deliveries.*', 'clients.fullname as client_name', 'users.name as deliverer_name')
        ->get()
        ->groupBy(function($data) {
            return $data->code;
        });

        return view('deliveries.index', [
            "Deliveries" => $Deliveries
        ]);
    }

    public function addDeliveryPage() {

        $Deliverers = User::where('role', '>', 0)->get();
        $Clients = Client::all();
        $Products = Product::join('factories', 'factories.id', '=', 'products.factory')->select('products.*', 'factories.name as factory_name')->get();
        return view('deliveries.add', [
            "Deliverers" => $Deliverers,
            "Clients" => $Clients,
            "Products" => $Products,
        ]);
    }

    public function addAction(Request $request) {

        $products = json_decode($request->products, 1);
        $code = $this->generateUniqueCode();
        $client = $request->client;
        $deliverer = $request->deliverer;
        $errors = 0;
        foreach($products as $k => $Product) {
            if ($k !== 'HTML5_QRCODE_DATA') {
             $product = json_decode($Product, 1);

            try {
                $Delivery = new Delivery();
                $Delivery->client = $client;
                $Delivery->code = $code;
                $Delivery->deliverer = $deliverer;
                $Delivery->product = $product['id'];
                $Delivery->quantity = $product['quantity'];
                $Delivery->price = $product['price'];
                $Delivery->factory = $product['factory'];
                $Delivery->added = \Auth::user()->id;
                $Delivery->status = 1;
                if (!$Delivery->save()) $errors++;
            } catch (Exception $e) {
                echo($e->getMessage());
            }
        }
        }
        return $errors;
    }

    public function generateUniqueCode($codeLength = 9) {

        $characters = '0123456789xyzkqwv';
        $charactersNumber = strlen($characters);
        $code = "";

        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        if (Client::where('code', $code)->exists()) {
            $this->generateUniqueCode($codeLength);
        }

        return "D".$code;

    }
}
