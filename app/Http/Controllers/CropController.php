<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function index() 
    {    
        $crops = Crop::all();

        return view('crops.index', compact('crops'));
    }

    public function create()
    {
        return view('crops.create');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'crop_name' => 'required',
            'variety' => 'nullable',
            'cultivation_start_date' => 'required|date',

        ]);

        $crop = new Crop();

        $crop->crop_name = $validated['crop_name'];
        $crop->variety = $validated['variety'];
        $crop->cultivation_start_date = $validated['cultivation_start_date'];

        $crop->save();

        return redirect('/crops')
            ->with('success', '作物を登録しました。');
    }

    public function edit(int $id) 
    {
        $crop = Crop::findOrFail($id);

        return view('crops.edit', compact('crop'));
    }

    public function update(Request $request,int $id)
    {
        $validated = $request->validate([
            'crop_name' => 'required',
            'variety' => 'nullable',
            'cultivation_start_date' => 'required|date',

        ]);

        $crop = Crop::findOrFail($id);

        $crop->crop_name = $validated['crop_name'];
        $crop->variety = $validated['variety'];
        $crop->cultivation_start_date = $validated['cultivation_start_date'];

        $crop->save();

        return redirect('/crops')
            ->with('success', '作物を更新しました。');
    }

    public function destroy(int $id)
    {
        $crop = Crop::findOrFail($id);

        if (
            $crop->cultivationRecords()->exists()
            || $crop->pestControlRecords()->exists()
        ) {
            return redirect()
                ->route('crops.index')
                ->with(
                    'error',
                    '栽培記録または防除記録がある作物は削除できません。'
                );
        }

        $crop->delete();

        return redirect()
            ->route('crops.index')
            ->with('success', '作物を削除しました。');
    }
}

