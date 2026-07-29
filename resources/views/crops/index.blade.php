@extends('layouts.app')

@section('content')

<div class="page-header">
    <h1>作物一覧</h1>

    <a class="create-button" href="{{ route('crops.create') }}">
        新規登録
    </a>
</div>
    

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    @if(session('error'))
    <p>{{ session('error') }}</p>
    @endif

<div class="table-wrapper">
    <table class="crop-table">
        <thead>
            <tr>
                <th>作物名</th>
                <th>品種</th>
                <th>栽培開始日</th>
                <th>編集</th>
                <th>防除記録</th>
                <th>削除</th>
        </tr>
        </thead>
        
        <tbody>
            @foreach ($crops as $crop)
                <tr>
                    <td>
                        <a href="{{ route('cultivation-records.index', $crop->id) }}"
                           class="crop-name-link"
                        >
                            {{ $crop->crop_name }}
                        </a>
                    </td>
                    <td>{{ $crop->variety }}</td>
                    <td>{{ $crop->cultivation_start_date }}</td>
                    <td>
                        <a
                            href="{{ route('crops.edit', $crop->id )}}"
                            class="edit-button"
                        >
                            編集
                        </a>
                    </td>

                    <td>
                        <a href="{{ route('pest-control-records.index', $crop->id) }}"
                           class="pest-control-button">
                            防除記録
                        </a>
                    </td>

                    <td>
                        <form 
                            action="{{ route('crops.destroy', $crop->id) }}" 
                            method="POST"
                            style="display: inline"
                        >

                            @csrf
                            @method('DELETE')

                            <button 
                                class="delete-button"
                                type="submit"
                                onclick="return confirm('この作物を削除しますか？')"
                            >
                                削除
                            </button>
                        </form>
                    </td>    
                </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

@endsection