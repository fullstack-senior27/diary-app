@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('diaries.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">新規作成</a>
    </div>

    @foreach ($diaries as $diary)
        <div class="mb-6 border-b pb-4">
            @if ($diary->image_path)
                <img src="{{ asset('storage/' . $diary->image_path) }}" alt="日記画像" class="w-48 mb-2">
            @endif
            <div>{{ $diary->created_at->format('Y/m/d') }}</div>
            <p>{{ $diary->content }}</p>
            <div class="mt-2">
                <a href="{{ route('diaries.edit', $diary) }}" class="text-blue-500">編集</a> |
                <form action="{{ route('diaries.destroy', $diary) }}" method="POST" class="inline-block" onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">削除</button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="mt-6">
        {{ $diaries->links() }}
    </div>
@endsection
