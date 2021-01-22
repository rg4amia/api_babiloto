<?php

namespace App\Http\Controllers;

use App\Models\Tirage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TirageController extends Controller
{
    public function show(){

        $dt = Carbon::now();

        switch ($dt->dayOfWeek){
            case Carbon::MONDAY :
                $tirages = Tirage::where('jour','lundi')->first();
                break;
            case Carbon::TUESDAY:
                $tirages = Tirage::where('jour','mardi')->first();
                break;
            case Carbon::WEDNESDAY:
                $tirages = Tirage::where('jour','mercredi')->first();
                break;
            case Carbon::THURSDAY:
                $tirages = Tirage::where('jour','jeudi')->first();
                break;
            case Carbon::FRIDAY:
                $tirages = Tirage::where('jour','vendredi')->first();
                break;
            case Carbon::SATURDAY:
                $tirages = Tirage::where('jour','samedi')->first();
                break;
            case Carbon::SUNDAY:
                $tirages = Tirage::where('jour','dimanche')->first();
                break;
        }

        if (!$tirages) {
            return response()->json([
                'success' => false,
                'message' => 'Tirages not found'
            ], 400);
        }
        return response()->json($tirages->tirage, 400);
    }
}
