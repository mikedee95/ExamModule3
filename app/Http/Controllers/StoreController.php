<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        return view('index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required',
            'name' => 'required|max:255',
            'phone' => 'required|min:8|max:10',
            'email' => 'required|unique:stores',
            'address' => 'required|max:255',
            'manager' => 'required|max:255',
            'status' => 'required'
        ]);
        $show = Store::create($validatedData);

        return redirect('/stores')->with('success', 'Store is successfully saved');
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
        $store = Store::findOrFail($id);

        return view('edit', compact('store'));
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

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|min:8|max:10',
            'email' => 'required',
            'address' => 'required|max:255',
            'manager' => 'required|max:255',
            'status' => 'required'
        ]);
        Store::whereId($id)->update($validatedData);

        return redirect('/stores')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect('/stores')->with('success', 'Data is successfully deleted');
    }

    public function search(Request $request)
    {
        $store = Store::where('name','LIKE','%'.$request->keyword.'%')->get();
        return view('search',compact('store'));
    }
}
