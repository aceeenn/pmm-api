<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Booking::all();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            return response($res);
        }
        else{
            $res['message'] = "Empty!";
            return response($res);
        }
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
        $lapangan = $request->input('lapangan');
        $alamat = $request->input('alamat');
        $harga = $request->input('hargas');
        $nohp = $request->input('nohp');
    
        $data = new \App\Booking();
        $data->lapangan = $lapangan;
        $data->alamat = $alamat;
        $data->harga = $harga;
        $data->nohp = $nohp;
    
        if($data->save()){
            $res['message'] = "Success!";
            $res['value'] = "$data";
            return response($res);
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = \App\Booking::where('id',$id)->get();

    if(count($data) > 0){ //mengecek apakah data kosong atau tidak
        $res['message'] = "Success!";
        $res['values'] = $data;
        return response($res);
    }
    else{
        $res['message'] = "Failed!";
        return response($res);
    }
}
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lapangan = $request->input('lapangan');
        $alamat = $request->input('alamat');
        $harga = $request->input('harga');
        $nohp = $request->input('nohp');
    
        $data = \App\Booking::where('id',$id)->first();
        $data->lapangan = $lapangan;
        $data->alamat = $alamat;
        $data->harga = $harga;
        $data->nohp = $nohp;
    
        if($data->save()){
            $res['message'] = "sukses";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "Failed!";
            return response($res);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = \App\Booking::where('id',$id)->first();

        if($data->delete()){
            $res['message'] = "berhasil ey!";
            $res['value'] = "$data";
            return response($res);
        }
        else{
            $res['message'] = "gagal ey!";
            return response($res);
        }
    }
}