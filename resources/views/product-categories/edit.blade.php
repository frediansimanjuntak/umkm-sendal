<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Product Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('product-categories.update', $productCategory) }}">
                        @csrf
                        @method('PUT')
                
                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $productCategory->name)" autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                
                        <!-- Code -->
                        <div class="mt-4">
                            <x-input-label for="code" :value="__('Code')" />
                            <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" :value="old('code', $productCategory->code)" required  autocomplete="code" />
                            <x-input-error :messages="$errors->get('code')" class="mt-2" />
                        </div>

                        <!-- Indexing -->
                        <div class="mt-4">
                            <x-input-label for="indexing" :value="__('Indexing')" />
                            <x-text-input id="indexing" class="block mt-1 w-full" type="number" name="indexing" :value="old('indexing', $productCategory->indexing)" required  autocomplete="indexing" />
                            <x-input-error :messages="$errors->get('indexing')" class="mt-2" />
                        </div>
                
                        <!-- Description -->
                        <div class="mt-4">
                            <x-input-label for="description" :value="__('Description')" />
                            <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $productCategory->description)" required  autocomplete="description" />
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
