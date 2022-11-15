<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
class ClientsController extends Controller
{
    public function index() {

        if (\Auth::user()->role == '1')
            return redirect()->intended('/deliveries');

        $Clients = Client::all();
        return view('clients.index', [
            "Clients" => $Clients
        ]);
    }
    public function addAction(Request $request) {

        $request->validate( [
            'lastname' => 'required|min:2',
            'firstnames' => 'required|min:2',
            'address'   => 'required',
            'phone'   => 'required',
            'register' => 'required'

        ]);
        $code = $this->generateUniqueCode();

        $Client = new Client();
        $Client->fullname = $request->firstnames . ', ' . $request->lastname;
        $Client->address = $request->address ?? 'N/A';
        $Client->phone = $request->phone;
        $Client->register = $request->register;
        $Client->code = $code;
        $Client->added = \Auth::user()->id;

        if ($Client->save())
            return redirect()->intended('/clients');

        return redirect()->back()->with('fail', 'Opération Echouée!');

    }
    public function addClientPage() {
        if (\Auth::user()->role == '1')
            return redirect()->intended('/deliveries');
        return view('clients.add', [
        ]);

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

        return "C".$code;

    }
}
