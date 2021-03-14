<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Client::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            return Client::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($client)
    {
        //show a post
        return Client::find($client);
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
        //update a post

      $client = Client::find($id)->update($request->all());

      return $client;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function balance()
    {
        return Client::where('loan','>',0)->orderBy('name')->get();
    }

    public function dividend(){
        $clients = Client::get();

        return $clients->map(function($clients){
                $divident = $clients->capitalization * 0.023;
                $clients->setRelation('dividend',$dividend);
                return $clients->only(['name','capitalization','divident']);
        });
    }

    public function deposit(Request $request, $client){
        $findClient = Client::find($client);
        $findClient->update(['capitalization' => $findClient->capitalization + $request->amount]);
        return $client;
    }
}
