@extends('layouts.app')

@section('content')
    <h1>作物編集</h1>

    <form 
        action="{{ route('crops.update', $crop->id) }}" 
        method="POST"
        class="crop-form"
    >
        @csrf
        @method('PUT')
    <div class="form-group">
        <label>作物名</label>
        <input type="text" 
               name="crop_name"
               value="{{ old('crop_name', $crop->crop_name) }}"
        >

        @error('crop_name')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label>品種</label>
        <input type="text"
               name="variety"
               value="{{ old('variety', $crop->variety) }}"
        >
    </div>

    <div class="form-group">
        <label>栽培開始日</label>
        <input type="date" 
               name="cultivation_start_date"
               value="{{ old('cultivation_start_date', $crop->cultivation_start_date) }}"
        >

        @error('cultivation_start_date')
            <p>{{ $message }}</p>
        @enderror
    </div>
    
        
        <button 
            type="submit" 
            class="submit-button"
        >
            更新
        </button>

    </form>
@endsection