@extends('layouts.app')

@section('content')
    <h1>作物登録</h1>

    <form class="crop-form"
          action="/crops"   
          method="POST"
    >
        @csrf
    
    <div class="form-group">
        <label>作物名</label>
        <input type="text" 
               name="crop_name"
               value="{{ old('crop_name') }}"
        >

        @error('crop_name')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div class="form-group">
        <label>品種</label>
        <input type="text"
               name="variety"
               value="{{ old('variety') }}"
        >
    </div>   

    <div class="form-group">    
        <label>栽培開始日</label>
        <input type="date" 
               name="cultivation_start_date"
               value="{{ old('cultivation_start_date') }}"
        >

        @error('cultivation_start_date')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

        <button 
            type="submit" 
            class="submit-button"
        >
            登録
        </button>
        
    </form>
@endsection