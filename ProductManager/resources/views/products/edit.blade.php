<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            商品編集
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <section class="text-gray-600 body-font relative">
                        <form method="post" action="{{ route('products.update', ['id' => $product->id]) }}">
                            @csrf
                            <div class="container px-5 mx-auto">
                                <div class="lg:w-1/2 md:w-2/3 mx-auto">
                                    <div class="flex flex-wrap -m-2">
                                        <div class="flex">
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="maker_id"
                                                        class="leading-7 text-sm text-gray-600">メーカー</label><br>
                                                    <select name="maker_id">
                                                        <option value="">選択してください</option>
                                                        @foreach ($makers as $maker)
                                                            <option value="{{ $maker->id }}"
                                                                {{ $product->maker_id == $maker->id ? 'selected' : '' }}
                                                                {{ old('maker_id', $product->maker_id) == $maker->id ? 'selected' : '' }}>
                                                                {{ $maker->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="p-2 w-full">
                                                <div class="relative">
                                                    <label for="category_id"
                                                        class="leading-7 text-sm text-gray-600">カテゴリ</label><br>
                                                    <select name="category_id">
                                                        <option value="">選択してください</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}"
                                                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="name"
                                                    class="leading-7 text-sm text-gray-600">商品名</label>
                                                <input type="text" id="name" name="name"
                                                    value="{{ old('name', $product->name) }}"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="description"
                                                    class="leading-7 text-sm text-gray-600">商品説明</label>
                                                <textarea id="description" name="description"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out">{{ old('description', $product->description) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="p-2 w-full">
                                            <div class="relative">
                                                <label for="price" class="leading-7 text-sm text-gray-600">金額</label>
                                                <input type="text" id="price" name="price" inputmode="numeric"
                                                    value="{{ old('price', $product->price) }}"
                                                    class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 w-full my-4">
                                <div class="flex gap-10 justify-center">
                                    <button
                                        class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">変更する
                                    </button>
                                </div>
                            </div>
                        </form>

                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
