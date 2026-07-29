@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>栽培記録一覧</h1>

    <a 
        href="{{ route('cultivation-records.create', $crop->id) }}"
        class="create-button"
    >
        栽培記録を追加
    </a>
</div>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<p>作物名： {{ $crop->crop_name }}</p>

<form method="GET" 
      action="{{ route('cultivation-records.index', $crop->id) }}"
      class="search-form"
>
    
    <label for="work_date">作業日</label>

    <input type="date" 
           id="work_date"  
           name="work_date" 
           value="{{ request('work_date') }}"
    >

    <button type="submit" 
            class="submit-button"
    >
            検索
    </button>
</form>

<table class="cultivation-records-table">
    <tr>
        <th class="work-date-column">作業日時</th>
        <th class="weather-column">天候</th>
        <th class="work-column">作業内容</th>
        <th class="memo-column">メモ</th>
        <th class="actions-column">操作</th>
    </tr>

    @foreach ($cultivationRecords as $record)
        <tr>
            <td class="work-date-column">{{ $record->work_date }}</td>
            <td class="weather-column">{{ $record->weather }}</td>
            <td class="work-column">{{ $record->work }}</td>
            <td class="memo-column">{{ $record->memo }}</td>
            <td class="actions-column">
                <a 
                    href="{{ route('cultivation-records.edit', [$crop->id, $record->id]) }}"
                    class="edit-button"    
                >
                    編集
                </a>
                
                <form 
                    action="{{ route('cultivation-records.destroy', [$crop->id, $record->id]) }}"
                    method="POST"
                    style="display: inline"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="delete-button"
                        onclick="return confirm('この栽培記録を削除しますか？')"
                    >
                        削除
                    </button>

                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection