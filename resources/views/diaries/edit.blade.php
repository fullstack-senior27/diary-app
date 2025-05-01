@extends('layouts.app')

@section('content')
    <h2 class="text-xl mb-4">日記編集</h2>

    @if ($errors->any())
        <div class="text-red-500 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('diaries.update', $diary) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="date">日付:</label>
            <input type="date" name="date" class="border px-2 py-1 w-full" value="{{ old('date', $diary->date?->format('Y-m-d')) }}">
        </div>
        <div class="mb-4">
            <label>日記内容:</label>
            <input type="text" name="content" class="border px-2 py-1 w-full" value="{{ old('content', $diary->content) }}" required>
        </div>
        <div class="mb-4">
            <label>現在の画像:</label><br>
            @if ($diary->image_path)
                <img src="{{ asset('storage/' . $diary->image_path) }}" alt="日記画像" class="w-48 mb-2">
            @else
                <p>画像なし</p>
            @endif
        </div>
        <div class="mb-4">
            <label>画像を変更する (JPGのみ):</label>
            <input type="file" name="image" accept=".jpg,.jpeg">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">更新</button>
        <a href="{{ route('diaries.index') }}" class="ml-4 text-gray-500">戻る</a>
    </form>
@endsection
