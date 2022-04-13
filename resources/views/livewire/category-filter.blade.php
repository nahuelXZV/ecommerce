<div>

    <div class="bg-white rounded shadow-lg mb-4">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">{{ $category->name }}</h1>

            <div class="grid grid-cols-2 cursor-pointer border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i class="p-3 cur">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                </i>
                <i class="p-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M3 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm0 4a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                </i>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-5 ">

        <aside>
            <h2 class="font-semibold text-center mb-2">Subcategorias</h2>
            <ul>
                @foreach ($category->subcategories as $subcategory)
                    <li class="my-2 text-sm ">
                        <a href=""
                            class=" cursor-pointer uppercase hover:text-orange-500   ">{{ $subcategory->name }}</a>
                    </li>
                @endforeach
            </ul>
        </aside>
        <div class="col-span-4">
            <ul class="grid grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow sm:mr-4">
                        <article>
                            <figure>
                                <img src="{{ Storage::url($product->images->first()->url) }}" alt=""
                                    class="h-48 w-full object-cover object-center">
                            </figure>
                            <div class="py-4 px-6">
                                <h1 class="text-lg font-semibold ">
                                    <a href="">{{ Str::limit($product->name, 20, '...') }}</a>
                                </h1>
                                <p class="font-bold text-gray-700">US$ {{ $product->price }} </p>
                            </div>
                        </article>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>



</div>
