<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ваши объявления') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="relative overflow-x-auto">

                        <a href="{{ route('dashboard.promo.create') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Добавить объявление →</a>


                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Название
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Описание
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Категория
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Цена (₽)
                                    </th>
                                    <th scope="col"  class="px-6 py-3 text-center">
                                        Просмотр
                                    </th>
                                    <th scope="col"  class="px-6 py-3 text-center">
                                        Изменение
                                    </th>
                                    <th scope="col"  class="px-6 py-3 text-center">
                                        Удаление
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($promos) > 0 )
                                @foreach($promos as $promo)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $promo->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $promo->description }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $promo->category->title }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $promo->price }} ₽
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <!-- сделать ссылку -->
                                        
    
                                        <a href="{{ route('dashboard.promo.show', $promo->id) }}" class="flex items-center justify-center">
                                            <svg class="w-6 h-6  text-gray-800 dark:text-indigo-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                                                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                                                    <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                                                </g>
                                            </svg>
                                        </a>
                                    </td>
                                    <td class=" text-center">
                                        <a href="{{ route('dashboard.promo.edit', $promo->id) }}" class="flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-800 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('dashboard.promo.delete', $promo->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <svg class="w-6 h-6 text-gray-800 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else <p class="text-green-600"> Извините но вы ещё не добавляли объявления, воспользуйтесь кнопкой выше ↑ </p>
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>