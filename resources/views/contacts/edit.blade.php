<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            お問い合わせ詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  {{-- フォーム開始 --}}
                  <form method="post" action="{{route('contacts.show',['id' => $contact->id])}}">
                    @csrf
                    <section class="text-gray-600 body-font relative">
                      <div class="container px-5 py-24 mx-auto">
                        <div class="flex flex-col text-center w-full mb-12">
                          <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">お問い合わせ詳細</h1>
                        </div>
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                          {{-- 名前の --}}
                          <div class="m-2">
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="name" class="leading-7 text-sm text-gray-600">お名前</label>
                                <input type="text" id="name" name="name" value="{{ $contact->name}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            {{-- 件名 --}}
                            <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="title" class="leading-7 text-sm text-gray-600">件名</label>
                                  <input type="text" id="title" name="title" value="{{ $contact->title}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>
                            {{-- メアド --}}
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="email" class="leading-7 text-sm text-gray-600">メールアドレス</label>
                                <input type="email" id="email" name="email" value="{{ $contact->email}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              </div>
                            </div>
                            {{-- URL --}}
                            <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="url" class="leading-7 text-sm text-gray-600">URL</label>
                                  <input type="url" id="url" name="url" value="{{ $contact->url}}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                </div>
                              </div>

                              {{-- 性別 --}}
                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="gender" class="leading-7 text-sm text-gray-600">性別</label><br>
                                  <input type="radio" id="gender" name="gender" @if($gender === '男性') checked @endif value="0">男性
                                  <input type="radio" id="gender" name="gender" @if($gender === '女性') checked @endif checked value="0">女性
                                </div>
                              </div>

                              {{-- 年齢 --}}
                              <div class="p-2 w-full">
                                <div class="relative">
                                  <label for="age" class="leading-7 text-sm text-gray-600">年齢</label>
                                  <select name="age" id="age">
                                    @for($i=10;$i<81;$i++)
                                    <option value="{{$i}}">{{$i}}歳</option>
                                    @endfor
                                  </select>
                                </div>
                              </div>

                              {{-- お問い合わせ内容 --}}
                            <div class="p-2 w-full">
                              <div class="relative">
                                <label for="contact" class="leading-7 text-sm text-gray-600">お問い合わせ内容</label>
                                <textarea id="contact" name="contact" class="w-full bg-gray-100 bg-opacity-50 roundedborder border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ $contact->contact}}</textarea>
                              </div>
                            </div>

                            {{-- 編集ボタン --}}
                            <div class="p-2 w-full">
                              <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">上書き</button>
                            </div>

                            {{-- 戻るボタン --}}
                            <div class="p-2 w-full">
                              <button type="button" onclick="location.href='{{route('contacts.show',['id' => $contact->id])}}'" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">戻る</button>
                            </div>
                        </div>
                      </div>
                      </div>
                    </section>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
