<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderValidate;
use App\Models\Slider;
use App\Traits\ImageTrait;


class SliderController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $slider = Slider::all();
        return response()->view('dashboard.slider.index', ['slider' => $slider]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $data = Slider::all();
        return response()->view('dashboard.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderValidate $request)
    {
        // //

        $file_name=$this->saveImage($request->image,'images/slider');
        Slider::create([
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "image"=>$file_name,
            'status'=> $request->input('status'),
        ]);
        return response()->view('dashboard.slider.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = Slider::find($id);
        return response()->view('dashboard.slider.edit' , ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SliderValidate $request ,string $id)
    {

        $file_name = $this->saveImage($request->image,'images/slider');
        $data = Slider::findOrFail($id);
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->image=$file_name;
        $data->status = $request->input('status');
        $data->save();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $deleteCount = Slider::destroy($id);
        return redirect()->back();

    }
}
