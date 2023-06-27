<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Добавление объявления') }}
        </h2>
    </x-slot>


    <div class="py-12">
    
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('dashboard.promo.index') }}" class="font-semibold  text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">← Назад к списку объявлений</a>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                
                    <form action="{{ route('dashboard.promo.store') }}" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Название</label>
                            <input type="text" id="title" name="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Например: Часы..." value="{{ old('title') }}">
                            @error('title')
                            <div class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Описание</label>
                            <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Например: Новые, Выполнены из серебра...">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="contacts" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Контакты для связи</label>
                            <textarea id="contacts" name="contacts" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Например: Email, Номер телефона...">{{ old('contacts') }}</textarea>
                            @error('contacts')
                            <div class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Цена</label>
                            <input type="number" step="0.01" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Цена в рублях (₽)" value="{{ old('price') }}">
                            @error('price')
                            <div class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Выберите категорию</label>
                            <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? ' selected' : '' }}>{{ $category->title }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Выберите статус объявления</label>
                            <select id="status" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="Активна">Активна</option>
                                <option value="Неактивна">Неактивна</option>
                            </select>
                            @error('status')
                            <div class="text-sm text-red-600 dark:text-red-400 space-y-1 mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <input type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 
                        border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 
                        uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white 
                        focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 
                        focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                        dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 " value="Добавить">

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>