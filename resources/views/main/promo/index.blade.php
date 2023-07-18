<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Просмотр категории') }}
        </h2>
    </x-slot>


    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('main.index') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">← Вернуться назад</a>
                    <div class="relative overflow-x-auto">
                        <div class="flex">
                            @if(count($promos) > 0 )
                            @foreach($promos as $promo)
                            <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
                                <h2>Название: {{ $promo->title }}</h2>

                                <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                                    <a href="#" class="group">
                                        <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                                            <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-01.jpg" alt="Tall slender porcelain bottle with natural clay textured body and cork stopper." class="h-48 w-48 { object-cover object-center group-hover:opacity-75">
                                        </div>
                                        <h3 class="mt-4 text-lg"></h3>
                                        <p class=" font-semibold  ">Категория: {{ $promo->category->title }}</p>
                                        <p class=" text-sm ">Описание: {{ $promo->description }} </p>
                                        <p class="mt-1 text-lg font-medium dark:text-white text-gray-900">Цена: {{ $promo->price }} ₽</p>
                                        @auth
                                        @if (auth()->user()->id === $promo->user_id)
                                        
                                        <a href="{{ route('dashboard.promo.edit',  $promo->id) }}" class="text-green-600 dark:text-green-400">Редактировать</a>
                                        <form action="{{ route('dashboard.promo.delete',  $promo->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 dark:text-red-400">Удалить</button>
                                        </form>
                                        @endif
                                        @endauth
                                    </a>
                                </div>
                            </div>

                            @endforeach
                            @else <p class="text-green-600"> Извините но вы ещё не добавляли объявления, воспользуйтесь кнопкой выше ↑ </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>