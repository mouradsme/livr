<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factory;

class FactoriesController extends Controller
{

    public function index() {
        if (\Auth::user()->role == '1')
            return redirect()->intended('/deliveries');

        $Factories = Factory::all();
        return view('factories.index', [
            "Factories" => $Factories
        ]);
    }
    public function addAction(Request $request) {

        $request->validate( [
            'name' => 'required|min:2',
            'address'   => 'required',
            'phone'   => 'required'

        ]);
        $code = $this->generateUniqueCode();

        $Factory = new Factory();
        $Factory->name = $request->name;
        $Factory->address = $request->address ?? 'N/A';
        $Factory->phone = $request->phone;
        $Factory->code = $code;
        $Factory->added = \Auth::user()->id;

        if ($Factory->save())
            return redirect()->intended('/factories');

        return redirect()->back()->with('fail', 'Opération Echouée!');

    }
    public function addFactoryPage() {
        if (\Auth::user()->role == '1')
            return redirect()->intended('/deliveries');
        return view('factories.add', [
        ]);

    }  public function generateUniqueCode($codeLength = 9) {

        $characters = '0123456789xyzkqwv';
        $charactersNumber = strlen($characters);
        $code = "";

        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        if (Factory::where('code', $code)->exists()) {
            $this->generateUniqueCode($codeLength);
        }

        return "F".$code;

    }
}
