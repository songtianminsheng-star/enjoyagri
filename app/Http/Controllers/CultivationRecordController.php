<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\CultivationRecord;
use Illuminate\Http\Request;

class CultivationRecordController extends Controller
{
    public function index(Request $request, int $cropId)
    {
        $crop = Crop::findOrFail($cropId);

        $query = $crop->cultivationRecords();
        
        if ($request->filled('work_date')) {
            $query->whereDate('work_date', $request->work_date);
        }

        $cultivationRecords = $query->get();

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
        ], [
            'work_date.required' => '作業日時は必須です。',
            'work_date.date' => '作業日時を正しく入力してください。',
            'weather.required' => '天候は必須です。',
            'work.required' => '作業内容は必須です。',
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
        $crop = Crop::findOrFail($cropId);

        $cultivationRecord = $crop->cultivationRecords()->findOrFail($id);

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
        ], [
            'work_date.required' => '作業日時は必須です。',
            'work_date.date' => '作業日時を正しく入力してください。',
            'weather.required' => '天候は必須です。',
            'work.required' => '作業内容は必須です。',
        ]);

        $crop = Crop::findOrFail($cropId);
        $cultivationRecord = $crop->CultivationRecords()->findOrFail($id);

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
        $crop = Crop::findOrFail($cropId);
        $cultivationRecord = $crop->CultivationRecords()->findOrFail($id);

        $cultivationRecord->delete();

        return redirect()
            ->route('cultivation-records.index', $cropId)
            ->with('success', '栽培記録を削除しました。');
    }
}
