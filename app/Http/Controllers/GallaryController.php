<?php

namespace App\Http\Controllers;

use App\Gallary;
use Illuminate\Http\Request;

class GallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gallary.index')->with('galls', Gallary::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gals = new Gallary();

        $gals->title = $request->title;
        $array = [];
        foreach ($request->images as $gal) {
            $image = $gal->store('gallary');
            array_push($array, $image);
        }
        $gals->images = json_encode($array);
        $gals->save();

        return redirect()->route('gallery.index')->with(['success' =>trans('Added successfully')]);
    }



    public function edit($id)
    {
        return view('admin.gallary.edit')->with('gal', Gallary::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $gals = Gallary::find($id);
        $gals->title = $request->title;
        $array = [];
        if ($request->images != null) {


            foreach ($request->images as $gal) {
                $image = $gal->store('gallary');
                array_push($array, $image);
            }
        }
        if ($request->test != null) {
            foreach ($request->test as $im) {
                array_push($array, $im);
            }
        }
        $gals->images = json_encode($array);
        $gals->save();
        return redirect()->route('gallery.index')->with(['success' => trans('Edit successfully')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallary  $gallary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gals = Gallary::find($id);
        $gals->delete();
        return redirect()->route('gallery.index')->with(['success' => trans('Deleted successfully')]);
    }
}
