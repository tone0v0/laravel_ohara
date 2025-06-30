<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{--　個別ブロック --}}
                    @foreach($values as $value)
                    {{-- foreach内の処理 --}}
                    {{-- DBのデータを1件ずつ表示 --}}
                    {{-- マスタッシュ構文 PHPをHTML内でエスケープ処理 --}}
                    DBのIDは{{$value->id}}です。<br>
                    DBのテキストは{{$value->text}}です。<br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
