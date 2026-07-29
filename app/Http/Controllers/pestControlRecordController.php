<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\PestControlRecord;
use Illuminate\Http\Request;

class pestControlRecordController extends Controller
{
    public function index(int $cropId)
    {
        $crop = Crop::find($cropId);

        $pestControlRecords = $crop->pestControlRecords;

        return view(
            'pest-control-records.index',
            compact('crop', 'pestControlRecords')
        );
    }

    public function create(int $cropId)
    {
        $crop = Crop::find($cropId);

        return view(
            'pest-control-records.create',
            compact('crop')
        );
    }

    public function store(Request $request, int $cropId)
    {
        $validated = $request->validate(
            [
                'treatment_date' => 'required|date',
                'weather' => 'required',
                'target_pest' => 'required',
                'pesticide_name' => 'required',
                'dilution_rate' => 'required',
                'amount' => 'required',
                'usage_count' => 'nullable',
                'usage_period' => 'nullable',
                'memo' => 'nullable',
            ],
            [],
            [
                'treatment_date' => '防除日時',
                'weather' => '天候',
                'target_pest' => '対象病害虫',
                'pesticide_name' => '農薬名',
                'dilution_rate' => '希釈倍率',
                'amount' => '使用量',
                'usage_count' => '使用回数',
                'usage_period' => '使用時期',
                'memo' => 'メモ',
            ]
        );

        $pestControlRecord = new PestControlRecord();
        $pestControlRecord->crop_id = $cropId;
        $pestControlRecord->treatment_date = $validated['treatment_date'];
        $pestControlRecord->weather = $validated['weather'];
        $pestControlRecord->target_pest = $validated['target_pest'];
        $pestControlRecord->pesticide_name = $validated['pesticide_name'];
        $pestControlRecord->dilution_rate = $validated['dilution_rate'];
        $pestControlRecord->amount = $validated['amount'];
        $pestControlRecord->usage_count = $validated['usage_count'] ?? null;
        $pestControlRecord->usage_period = $validated['usage_period'] ?? null;
        $pestControlRecord->memo = $validated['memo'] ?? null;

        $pestControlRecord->save();

        return redirect()
            ->route('pest-control-records.index', $cropId)
            ->with('success', '防除記録を登録しました。');
    }

    public function show(int $cropId, int $id)
    {
        $crop = Crop::find($cropId);

        $pestControlRecord = PestControlRecord::find($id);

        return view('pest-control-records.show', compact('crop', 'pestControlRecord'));
    } 

    public function edit(int $cropId, int $id)
    {
        $crop = Crop::find($cropId);

        $pestControlRecord = PestControlRecord::find($id);

        return view(
            'pest-control-records.edit',
            compact('crop', 'pestControlRecord')
        );
    }
    
    public function update(Request $request, int $cropId, int $id)
    {
     $validated = $request->validate(
            [
                'treatment_date' => 'required|date',
                'weather' => 'required',
                'target_pest' => 'required',
                'pesticide_name' => 'required',
                'dilution_rate' => 'required',
                'amount' => 'required',
                'usage_count' => 'nullable',
                'usage_period' => 'nullable',
                'memo' => 'nullable',
            ],
            [],
            [
                'treatment_date' => '防除日時',
                'weather' => '天候',
                'target_pest' => '対象病害虫',
                'pesticide_name' => '農薬名',
                'dilution_rate' => '希釈倍率',
                'amount' => '使用量',
                'usage_count' => '使用回数',
                'usage_period' => '使用時期',
                'memo' => 'メモ',
            ]
        
        );
        $pestControlRecord = PestControlRecord::find($id);
        
        $pestControlRecord->treatment_date = $validated['treatment_date'];
        $pestControlRecord->weather = $validated['weather'];
        $pestControlRecord->target_pest = $validated['target_pest'];
        $pestControlRecord->pesticide_name = $validated['pesticide_name'];
        $pestControlRecord->dilution_rate = $validated['dilution_rate'];
        $pestControlRecord->amount = $validated['amount'];
        $pestControlRecord->usage_count = $validated['usage_count'] ?? null;
        $pestControlRecord->usage_period = $validated['usage_period'] ?? null;
        $pestControlRecord->memo = $validated['memo'] ?? null;

        $pestControlRecord->save();

        return redirect()
            ->route('pest-control-records.index', $cropId)
            ->with('success', '防除記録を更新しました。');   
    }
    
    public function destroy(int $cropId, int $id)
    {
        $pestControlRecord = PestControlRecord::find($id);

        $pestControlRecord->delete(); 

        return redirect()
            ->route('pest-control-records.index', $cropId)
            ->with('success', '防除記録を削除しました。');

    }
}
