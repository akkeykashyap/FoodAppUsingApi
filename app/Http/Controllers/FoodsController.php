<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class FoodsController extends Controller
{

    public function display(Request $request)
    {

        $foods = ['item' => []];

        if ($request->isMethod('get')) {
            $title = $request->input('food');

            $response = Http::withheaders([
                "x-rapidapi-host" => "chinese-food-db.p.rapidapi.com",
                "x-rapidapi-key" => "275ae33d7fmshb2db00522b0c720p135beejsna20a10208221",
            ])->get("https://chinese-food-db.p.rapidapi.com/", [
                'text' => $foods,
            ]);

            if ($response->successful()) {
                $foods = $response->json();
            } else {
                $foods = ['item' => [], 'error' => 'failed to receive data'];
            }
        }
        return view('foods', ['foods' => $foods]);
    }

    public function show($id)
    {
        try {
            $response = Http::withHeaders([
                "x-rapidapi-host" => "chinese-food-db.p.rapidapi.com",
                "x-rapidapi-key" => "275ae33d7fmshb2db00522b0c720p135beejsna20a10208221",
            ])->get("https://chinese-food-db.p.rapidapi.com/{$id}");

            if ($response->successful()) {
                $details = $response->json();
                return view('details', ['details' => $details,]);
            } else {
                throw new \Exception('Failed to retrieve chapters. Status: ' . $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error occurred: ' . $e->getMessage()], 500);
        }
    }
}
