<?php

namespace App\Http\Controllers;

use App\Models\Tirage;
use App\Models\TirageWinMac;
use Carbon\Carbon;
use http\Exception\BadMessageException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

        $tirages = $tirages->tirage;

        return view('paris.create',compact('tirages'));
    }


    public function generateParis(){

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*dd($request->all());
        $validatedData = Validator::make($request->all(), [
            'mode'                  => ['required', 'string'],
            'tirage_win[n1]'          => ['required', 'integer'],
            'tirage_win[n2]'          => ['required', 'integer'],
            'tirage_win[n3]'          => ['required', 'integer'],
            'tirage_win[n4]'          => ['required', 'integer'],
            'tirage_win[n5]'          => ['required', 'integer'],
            'tirage_mac[n1]'          => ['required', 'integer'],
            'tirage_mac[n2]'          => ['required', 'integer'],
            'tirage_mac[n3]'          => ['required', 'integer'],
            'tirage_mac[n4]'          => ['required', 'integer'],
            'tirage_mac[n5]'          => ['required', 'integer'],
        ])->validate();*/

        $data = $request->all();


        try {
            $tirage_win_mac = TirageWinMac::create($data);

            if ($tirage_win_mac){
                session()->flash('success','Enregisrement effectue avec succees');
            }

        }catch (\Exception $e){
            session()->flash('warning',$e->getMessage());
        }

        return  back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
