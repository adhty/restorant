<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-2">

        <div class="flex mt-6 justify-between items-center">
            <h2 class="font-semibold text-xl text-blue-600">Edit Menu</h2>
            @include('menu.delete')
        </div>

        <div class="mt-4" x-data="{ imageUrl: '/storage/{{$menu->foto}}' }">
            <form enctype="multipart/form-data" method="POST" action="{{ route('menu.update', $menu) }}" class="flex gap-8">
                @csrf
                @method('PUT')

                <div class="w-1/2">
                    <!-- Perbaikan pada binding src -->
                    <img :src="imageUrl" class="rounded-md w-full h-auto" />
                </div>

                <div class="w-1/2">
                    <div>
                        <x-input-label for="gambar" :value="$menu->gambar" />
                        <!-- Tambahkan event listener untuk mengubah gambar -->
                        <x-text-input accept="image/*" id="gambar" class="block mt-1 w-full border p-2" type="file" name="gambar"
                            :value="old('gambar')" required
                            @change="previewImage" />
                        <x-input-error :messages="$errors->get('gambar')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="nama" :value="('Nama')" />
                        <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama"
                            :value="$menu->nama" required />
                        <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="harga" :value="('Harga')" />
                        <x-text-input id="harga" class="block mt-1 w-full" type="text" name="harga"
                            :value="$menu->harga" required />
                        <x-input-error :messages="$errors->get('harga')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="deskripsi" :value="('Deskripsi')" />
                        <x-text-area id="deskripsi" class="block mt-1 w-full" type="text"
                            name="deskripsi">{{ $menu->deskripsi }}</x-text-area>
                        <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                    </div>

                    <x-primary-button class="justify-center w-full mt-4">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>

        <script>
            function previewImage(event) {
                const file = event.target.files[0];
                if (file) {
                    this.imageUrl = URL.createObjectURL(file);
                }
            }
        </script>

    </div>
</x-app-layout>
