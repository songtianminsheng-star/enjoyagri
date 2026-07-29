<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\CultivationRecord;
use Illuminate\Http\Request;

class CultivationRecordController extends Controller
{
    public function index(int $cropId)
    {
        $crop = Crop::find($cropId);

        $cultivationRecords = $crop->cultivationRecords;

        return view(
            'cultivation-records.index',
            compact('crop', 'cultivationRecords')
        );
    }
    public function create(int $cropId)
    {
        $crop = Crop::find($cropId);

        return view(
            'cultivation-records.create',
            compact('crop')
        );
    }
    public function store(Request $request, int $cropId)
    {
        $validated = $request->validate([
            'work_date' => 'required|date',
            'weather' => 'required',
            'work' => 'required',
            'memo' => 'nullable',
        ]);

        $cultivationRecord = new CultivationRecord();
        $cultivationRecord->crop_id = $cropId;
        $cultivationRecord->work_date = $validated['work_date'];
        $cultivationRecord->weather = $validated['weather'];
        $cultivationRecord->work = $validated['work'];
        $cultivationRecord->memo = $validated['memo'] ?? null;

        $cultivationRecord->save();

        return redirect()
            ->route('cultivation-records.index', $cropId)
            ->with('success', '栽培記録を登録しました。');
    }
    public function edit(int $cropId, int $id)
    {
        $crop = crop::find($cropId);

        $cultivationRecord = CultivationRecord::find($id);

        return view(
            'cultivation-records.edit',
            compact('crop', 'cultivationRecord')
        );
    }
    public function update(Request $request, int $cropId, int $id)
    {
        $validated = $request->validate([
            'work_date' => 'required|date',
            'weather' => 'required',
            'work' => 'required',
            'memo' => 'nullable',
        ]);

        $cultivationRecord = CultivationRecord::find($id);

        $cultivationRecord->work_date = $validated['work_date'];
        $cultivationRecord->weather = $validated['weather'];
        $cultivationRecord->work = $validated['work'];
        $cultivationRecord->memo = $validated['memo'] ?? null;

        $cultivationRecord->save();

        return redirect()
            ->route('cultivation-records.index', $cropId)
            ->with('success', '栽培記録を更新しました。');
    }
    public function destroy(int $cropId, int $id) 
    {
        $cultivationRecord = CultivationRecord::find($id);

        $cultivationRecord->delete();

        return redirect()
            ->route('cultivation-records.index', $cropId)
            ->with('success', '栽培記録を削除しました。');
    }
}
