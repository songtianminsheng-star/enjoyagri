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
                    <a href="{{ route('pest-control-records.show', [$crop->id, $record->id]) }}">
                        {{ $record->treatment_date }}
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection