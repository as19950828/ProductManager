<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            メーカー詳細
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <section class="text-gray-600 body-font relative">
                        <div class="container px-5 mx-auto">
                            <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                <div class="flex flex-wrap -m-2">
                                    <div class="p-2 w-full">
                                        <div class="relative">
                                            <label class="leading-7 text-sm text-gray-600">メーカー名</label>
                                            <div
                                                class="w-full rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                                {{ $maker->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-2 w-full my-4">
                                        <div class="flex gap-10 justify-center">
                                            <form method="get"
                                                action="{{ route('makers.edit', ['id' => $maker->id]) }}">
                                                <button
                                                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">編集
                                                </button>
                                            </form>

                                            <form method="post"
                                                action="{{ route('makers.destroy', ['id' => $maker->id]) }}">
                                                @csrf
                                                <button
                                                    class="text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg"
                                                    onclick="return confirm('本当に削除しますか？')">
                                                    削除する
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
