<x-app-layout>
    <x-slot name="header">
        <div class="flex gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mx-4 my-2">
                カテゴリ一覧
            </h2>
            <form method="get" action="{{ route('categories.create') }}">
                <button
                    class="text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録</button><br>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="flex justify-end gap-4 my-4" method="get" action="{{ route('categories.index') }}">
                        <input type="text" name="search" id="search" placeholder="カテゴリ名で検索"
                            value="{{ request('search') }}">
                        <button
                            class="text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索</button>
                    </form>

                    <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                        <table class="table-auto w-full text-left whitespace-no-wrap text-center">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                        ID
                                    </th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        カテゴリ名
                                    </th>
                                    <th
                                        class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                        詳細
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="border-t-2 border-gray-200 px-4 py-3"> {{ $category->id }}</td>
                                        <td class="border-t-2 border-gray-200 px-4 py-3">{{ $category->name }}</td>
                                        <td class="border-t-2 border-gray-200 px-4 py-3">
                                            <div class="flex gap-2 justify-center">
                                                <form method="get"
                                                    action="{{ route('categories.show', ['id' => $category->id]) }}">
                                                    <button
                                                        class="text-white bg-indigo-500 border-0 py-2 px-1 focus:outline-none hover:bg-indigo-600 rounded text-sm">詳細を確認
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
