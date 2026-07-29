@extends('layouts.app')

@section('content')

<h1>栽培記録登録</h1>

<p>作物名：{{ $crop->crop_name}}</p>

<form
    action="{{ route('cultivation-records.store', $crop->id) }}"
    method="POST"
    class="cultivation-record-form"
>
    @csrf

    <p>
        作業日時
        <input 
            type="datetime-local"
            name="work_date"
            value="{{ old('work_date') }}"
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
            value="{{ old('weather') }}"
        >

        @error('weather')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p>
        作業内容
        <textarea name="work" rows="3">{{ old('work') }}</textarea>

        @error('work')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p class="form-group">
        メモ
        <textarea name="memo" rows="3">{{ old('memo')}}</textarea>

        @error('memo')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <button type="submit" class="submit-button">
        追加
    </button>

</form>
@endsection