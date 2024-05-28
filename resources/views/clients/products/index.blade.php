<x-client-layout>
    <div class="p-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach ($products as $product)
            <div>
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        @if (count($product->product_images) > 0)
                        <img class="p-8 rounded-t-lg" src="{{count($product->product_images) > 0 ? $product->product_images->first()->image_url : ''}}" alt="product image" />
                        @endif
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$product->name}}</h5>
                        </a>
                        <div class="flex items-center justify-between">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-client-layout>


