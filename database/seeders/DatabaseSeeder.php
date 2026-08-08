<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Crop;
use App\Models\CultivationRecord;
use App\Models\PestControlRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'demo@enjoyagri.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('demo1234'),
            ]
        );

        $crop = Crop::firstOrNew([
            'crop_name' => 'ミニトマト',
        ]);

        $crop->variety = 'アイコ';
        $crop->cultivation_start_date = '2026-04-01';
        $crop->save();

        $cultivationRecord = CultivationRecord::firstOrNew([
        'crop_id' => $crop->id,
        'work_date' => '2026-08-01 08:00:00',
        ]);

        $cultivationRecord->weather = '晴れ';
        $cultivationRecord->work = '灌水・芽かき';
        $cultivationRecord->memo = '生育は順調。病害虫は見られなかった。';
        $cultivationRecord->save();

        $pestControlRecord = PestControlRecord::firstOrNew([
        'crop_id' => $crop->id,
        'treatment_date' => '2026-08-02 09:00:00',
        ]);

        $pestControlRecord->weather = '晴れ';
        $pestControlRecord->pesticide_name = 'サンプル農薬';
        $pestControlRecord->dilution_rate = '1000倍';
        $pestControlRecord->amount = '10L';
        $pestControlRecord->target_pest = 'コナジラミ';
        $pestControlRecord->usage_count = '1回';
        $pestControlRecord->usage_period = '収穫前日まで';
        $pestControlRecord->memo = '葉裏を中心に散布した。';
        $pestControlRecord->save();

    }
}
