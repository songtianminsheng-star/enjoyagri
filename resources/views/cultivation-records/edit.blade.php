@extends('layouts.app')

@section('content')

<h1>栽培記録編集</h1>

<p>作物名：{{ $crop->crop_name}}</p>

<form
    action="{{ route('cultivation-records.update', [$crop->id, $cultivationRecord->id]) }}"
    method="POST"
    class="cultivation-record-form"
>
    @csrf
    @method('PUT')

    <p>
        作業日時
        <input 
            type="datetime-local"
            name="work_date"
            value="{{ old('work_date', $cultivationRecord->work_date) }}"
        >

        @error('work_date')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p>
        天候
        <input 
            type="text"
            name="weather"
            value="{{ old('weather', $cultivationRecord->weather) }}"
        >

        @error('weather')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p>
        作業内容
        <textarea name="work">{{ old('work', $cultivationRecord->work) }}</textarea>

        @error('work')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p class="form-group">
        メモ
        <textarea name="memo">{{ old('memo', $cultivationRecord->memo) }}</textarea>
            
        @error('memo')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <button type="submit" class="submit-button">
        更新
    </button>

</form>
@endsection