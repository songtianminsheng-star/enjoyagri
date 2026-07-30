@extends('layouts.app')

@section('content')

<h1>防除記録一覧</h1>

@if(session('success'))
    <p>{{ session('success')}}</p>
@endif

<p>作物名：{{ $crop->crop_name}}</p>

<p>
    <a href="{{ route('pest-control-records.create', $crop->id)}}"
       class="create-button pest-control-create-button" 
    >
        防除記録を登録する
    </a>
</p>

<form method="GET"
      action="{{ route('pest-control-records.index', $crop->id) }}"
      class="search-form"
>
    <label for="target_pest">対象病害虫</label>

    <input type="text" 
           id="target_pest"
           name="target_pest"
           value="{{ request('target_pest') }}"
    >

    <button type="submit"
            class="submit-button"
    >
        検索
    </button>
</form>

<table class="pest-control-records-table">
    <thead>
        <tr>
            <th>防除日時</th>
        </tr>
    </thead>

    <tbody>
        @foreach($pestControlRecords as $record)
            <tr>
                <td>
                    <a 
                        class="record-detail-link"
                        href="{{ route('pest-control-records.show', [$crop->id, $record->id]) }}"
                    >
                        {{ $record->treatment_date }}
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection