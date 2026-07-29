@extends('layouts.app')

@section('content')

<h1>防除記録登録</h1>

<p>作物名：{{ $crop->crop_name}}</p>

<form 
    action="{{ route('pest-control-records.store', $crop->id) }}"
    method="POST"
    class="pest-control-record-form"
>
    @csrf

    <p class="form-group">
        防除日時
        <input type="datetime-local"
               name="treatment_date"
               value="{{ old('treatment_date') }}"
        >

            @error('treatment_date')
                <span>{{ $message }}</span>
            @enderror
    </p>

    <p class="form-group">
        天候
        <input type="text"
               name="weather"
               value="{{ old('weather') }}"
        >

            @error('weather')
                <span>{{ $message }}</span>
            @enderror
    </p>

    <p class="form-group">
        対象病害虫
        <input type="text"
               name="target_pest"
               value="{{ old('target_pest') }}"
        >

        @error('target_pest')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p class="form-group">
        農薬名
        <input type="text"
               name="pesticide_name"
               value="{{ old('pesticide_name') }}"
        >

        @error('pesticide_name')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p class="form-group">
        希釈倍率
        <input type="text"
               name="dilution_rate"
               value="{{ old('dilution_rate') }}"
        >

        @error('dilution_rate')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p class="form-group">
        使用量
        <input type="text"
               name="amount"
               value="{{ old('amount') }}"
        >

        @error('amount')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p class="form-group">
        使用回数
        <input type="text"
               name="usage_count"
               value="{{ old('usage_count') }}"
        >

        @error('usage_count')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p class="form-group">
        使用時期
        <input type="text"
               name="usage_period"
               value="{{ old('usage_period') }}"
        >

        @error('usage_period')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <p class="form-group">
        メモ
        <input type="text"
               name="memo"
               value="{{ old('memo') }}"
        >

        @error('memo')
            <span>{{ $message }}</span>
        @enderror
    </p>

    <button type="submit" class="submit-button">
        登録
    </button>
</form>
@endsection