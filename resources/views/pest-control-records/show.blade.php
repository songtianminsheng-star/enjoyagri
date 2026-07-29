@extends('layouts.app')

@section('content')

    <h1>防除記録詳細</h1>

    <table class="pest-control-record-detail-table">    
        <tr>
            <th>防除日時</th>
            <td>{{ $pestControlRecord->treatment_date }}</td>
        </tr>
        <tr>
            <th>天候</th>
            <td>{{ $pestControlRecord->weather }}</td>
        </tr>
        <tr>
            <th>対象病害虫</th>
            <td>{{ $pestControlRecord->target_pest }}</td>
        </tr>
        <tr>
            <th>農薬名</th>
            <td>{{ $pestControlRecord->pesticide_name }}</td>
        </tr>
        <tr>
            <th>希釈倍率</th>
            <td>{{ $pestControlRecord->dilution_rate }}</td>
        </tr>
        <tr>
            <th>使用量</th>
            <td>{{ $pestControlRecord->amount }}</td>
        </tr>
        <tr>
            <th>使用回数</th>
            <td>{{ $pestControlRecord->usage_count }}</td>
        </tr>
        <tr>
            <th>使用時期</th>
            <td>{{ $pestControlRecord->usage_period }}</td>
        </tr>
        <tr>
            <th>メモ</th>
            <td>{{ $pestControlRecord->memo }}</td>
        </tr>
    </table>

    <div class="detail-actions">
        <a href="{{ route('pest-control-records.edit', [$crop->id, $pestControlRecord->id]) }}"
           class="edit-button"
        >
            編集
        </a>

        <form action="{{ route('pest-control-records.destroy', [$crop->id, $pestControlRecord->id]) }}"
              method="POST"
        >
            @csrf
            @method('DELETE')

            <button type="submit"
                    class="delete-button"
                    onclick="return confirm('この防除記録を削除しますか？')"
            >
                削除
            </button>
        </form>
    </div>

    <a href="{{ route('pest-control-records.index', $crop->id) }}"
       class="back-button"
    >
        一覧へ戻る
    </a>
@endsection