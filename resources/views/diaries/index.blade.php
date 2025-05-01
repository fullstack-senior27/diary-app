@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800">1行日記</h1>
        <a href="{{ route('diaries.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded shadow">
            新規作成
        </a>
    </div>
    <div class="mb-4 space-x-4">
        <a href="{{ route('diaries.index', ['sort' => 'desc']) }}" class="text-blue-600 hover:underline">新しい順</a>
        <a href="{{ route('diaries.index', ['sort' => 'asc']) }}" class="text-blue-600 hover:underline">古い順</a>
    </div>

    <div class="space-y-6">
        @foreach ($diaries as $diary)
            <div class="flex items-start gap-4 border-b pb-4">
                @if ($diary->image_path)
                    <img src="{{ asset('storage/' . $diary->image_path) }}"
                         alt="日記画像"
                         class="w-28 h-28 object-cover rounded-lg border shadow-sm">
                @endif
                <div class="flex-1">
                    <div class="text-gray-500 text-sm">{{ $diary->date ? $diary->date->format('Y/m/d') : $diary->created_at->format('Y/m/d') }}</div>
                    <div class="text-base text-gray-800 font-medium mt-1">{{ $diary->content }}</div>
                    <div class="mt-2 space-x-4 text-sm">
                        <a href="{{ route('diaries.edit', $diary) }}" class="text-blue-600 hover:underline">編集</a>
                        <form action="{{ route('diaries.destroy', $diary) }}" method="POST" class="inline"
                              onsubmit="return confirm('削除してよろしいですか？')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">削除</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $diaries->links() }}
    </div>
@endsection
