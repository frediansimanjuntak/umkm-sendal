<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('products.update', $product) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $product->name)" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Product Category -->
                        <div class="mt-4">
                            <x-input-label for="product_category_id" :value="__('Product Category')" />
                            <select id="product_category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="product_category_id">
                                <option>Choose a product category</option>
                                @foreach ($productCategories as $item)
                                    <option value="{{$item->id}}" {{$product->product_category_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('product_category_id')" class="mt-2" />
                        </div>

                        <!-- Code -->
                        <div class="mt-4">
                            <x-input-label for="code" :value="__('Code')" />
                            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code', $product->code)" required  autocomplete="code" />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <!-- Indexing -->
                        <div class="mt-4">
                            <x-input-label for="indexing" :value="__('Indexing')" />
                            <x-text-input id="indexing" class="block mt-1 w-full" type="number" name="indexing" :value="old('indexing', $product->indexing)" required  autocomplete="indexing" />
                            <x-input-error :messages="$errors->get('indexing')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $product->description)" required  autocomplete="description" />
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>


                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
