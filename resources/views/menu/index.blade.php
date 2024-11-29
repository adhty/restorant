<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (session()->has('succes'))
        <x-alert message="{{session('succes')}} " />
        @endif

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

        <div class="container mt-3">
            <ul class="nav nav-tabs" id="foodTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="main-tab" data-bs-toggle="tab" data-bs-target="#main" type="button" role="tab" aria-controls="main" aria-selected="true">
                        Makanan Utama
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="drink-tab" data-bs-toggle="tab" data-bs-target="#drink" type="button" role="tab" aria-controls="drink" aria-selected="false">
                        Drinks
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="dessert-tab" data-bs-toggle="tab" data-bs-target="#dessert" type="button" role="tab" aria-controls="dessert" aria-selected="false">
                        Dessert
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="foodTabContent">
                <div class="tab-pane fade show active" id="main" role="tabpanel" aria-labelledby="main-tab">
                    <!-- <p class="mt-3">Main Course: Delicious meals to satisfy your hunger!</p> -->
                </div>
                <div class="tab-pane fade" id="drink" role="tabpanel" aria-labelledby="drink-tab">
                    <!-- <p class="mt-3">Drinks: Refreshing beverages to quench your thirst.</p> -->
                </div>
                <div class="tab-pane fade" id="dessert" role="tabpanel" aria-labelledby="dessert-tab">
                    <!-- <p class="mt-3">Desserts: Sweet treats to end your meal perfectly!</p> -->
                </div>
            </div>
        </div>
        <!-- buat tab dapat berpindah -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


        <div class="flex mt-6 items-center justify-between">
            <h2 class="fonts-semibold text-xl text-white mt-5">List Menu</h2>
            <!-- <button class="bg-gray-400 px-2 py-2  rounded-md font-semibold">Tambah</button> -->
        </div>

        <div class="p-10 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-4 lg:grid-cols-4 xl:grid-cols-4 gap-1 gap-0">
            @foreach ($menu as $menus )
            <div>
                <img src="{{url('storage/' .$menus->gambar)}}" />
                <div class="my-2">
                    <p class="text-xl font-light text-white font-semibold">{{ $menus->nama }}</p>
                    <p class="text-semibold text-gray-400">Rp. {{ number_format($menus->harga) }}</p>
                    
                </div>  
                <a href="{{route('menu.edit', $menus)}}">
                    <button class="bg-gray-400 px-10 py-2 my-2 rounded-md font-semibold">edit</button>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>