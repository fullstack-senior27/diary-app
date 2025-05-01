@extends('layouts.app')

@section('content')
    <h2 class="text-xl mb-4">新規日記作成</h2>

    @if ($errors->any())
        <div class="text-red-500 mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('diaries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label>日記内容:</label>
            <input type="text" name="content" class="border px-2 py-1 w-full" value="{{ old('content') }}" required>
        </div>
        <div class="mb-4">
            <label>画像 (JPGのみ):</label>
            <input type="file" name="image" accept=".jpg,.jpeg">
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">保存</button>
        <a href="{{ route('diaries.index') }}" class="ml-4 text-gray-500">戻る</a>
    </form>
@endsection
