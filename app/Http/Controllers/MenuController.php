<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Validator;


class MenuController extends Controller
{
    /**
     *@return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all(); // Ambil semua data menu
        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = validator($request->all(), [
            'name_menu' => 'required',
            'category_menu' => 'required',
            'rate_menu' => 'required',
            'desc_menu' => 'required',
            'price_menu' => 'required',
        ])->validate();
    
        $menu = new Menu($validatedData);
        $menu->save();
    
        return redirect(route('DaftarMenu'));
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
{
    if (!$menu) {
        return redirect()->route('DaftarMenu')->with('error', 'Menu tidak ditemukan.');
    }

    return view('menu.edit', compact('menu'));
}


    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
{
    $validatedData = $request->validate([
        'name_menu' => 'required',
        'category_menu' => 'required',
        'rate_menu' => 'required',
        'desc_menu' => 'required',
        'price_menu' => 'required',
    ]);

    // Update menu data
    $menu->fill($validatedData);
    $menu->save();

    return redirect(route('DaftarMenu'))->with('success', 'Data Berhasil Diupdate');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
{
    $menu->delete();

    return redirect(route('DaftarMenu'))->with('success', 'Menu berhasil dihapus');
}
}
