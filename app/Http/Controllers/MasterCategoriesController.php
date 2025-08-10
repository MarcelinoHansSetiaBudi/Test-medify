<?php

namespace App\Http\Controllers;

use App\Models\MasterCategories;
use Illuminate\Http\Request;
use Log;

class MasterCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master_categories.index.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $nama = $request->nama;
        $kode = $request->kode;

        $datas = MasterCategories::query();

        if(!empty($kode)) $datas = $datas->where('kode', $kode);
        if(!empty($kode)) $datas = $datas->where('nama', 'LIKE', '%' . $nama . '%');

        $datas = $datas->select('kode', 'nama')->orderBy('id')->get();

        return json_encode([
            'status'    =>  200,
            'datas'     =>  $datas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function formView($method, $id = 0)
    {
        if ($method == 'new') {
            $item = [];
        } else {
            $item = MasterCategories::find($id);
        }
        $data['item'] = $item;
        $data['method'] = $method;
        return view('master_categories.form.index', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterCategories  $masterCategories
     * @return \Illuminate\Http\Response
     */
    public function formSubmit(Request $request, $method, $id = 0)
    {
        try{
            if ($method == 'new') {
                $categoryData = new MasterCategories;
                $kode = MasterCategories::count('id');
                $kode = $kode + 1;
                $kode = str_pad($kode, 5, '0', STR_PAD_LEFT);
            } else {
                $categoryData = MasterCategories::find($id);
                $kode = $categoryData->kode;
            }

            $categoryData->kode = $kode;
            $categoryData->nama = $request->nama;
            $categoryData->save();

            session()->flash('success', 'Berhasil menambahkan Category '. $request->nama);

            return redirect('master-categories');

        }catch(\Exception $e)
        {
            Log::error('Master Categories formSubmit ' . __LINE__, [
                'kode' => $id,
                'method' => $method,
                'data'  => $request
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterCategories  $masterCategories
     * @return \Illuminate\Http\Response
     */
    public function singleView($kode)
    {
        $item = MasterCategories::where('kode', $kode)->first();
        return view('master_categories.single.index', [
            'data' => $item
        ]);
    }

    public function delete($id)
    {
        $data = MasterCategories::find($id);

        if(!empty($data)) $data->delete();

        $message = !empty($data) ? 'Berhasil menghapus data' : 'Gagal menghapus data';

        session()->flash(!empty($data) ? 'success' : 'error', $message);

        return redirect('master-categories');
    }
}
