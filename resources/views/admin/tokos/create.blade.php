<x-layouts.app :title="'Tambah Toko'">
    <form method="POST" action="{{ route('admin.tokos.store') }}" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Informasi Toko</h2>
            <div>
                <label class="block">Nama Toko</label>
                <input type="text" name="nama_toko" class="w-full rounded border px-3 py-2" required>
            </div>
            <div>
                <label class="block">Deskripsi</label>
                <textarea name="deskripsi" class="w-full rounded border px-3 py-2"></textarea>
            </div>
            <div>
                <label class="block">No Telepon</label>
                <input type="text" name="no_telepon" class="w-full rounded border px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Foto</label>

                <div class="flex items-center gap-4">
                    <div>
                        <img id="logoPreview" class="my-4 hidden h-24 w-24 object-cover rounded" />
                        <input id="logo-upload" name="logo" type="file"
                            class="sr-only" accept="image/*" onchange="previewLogo(event)">
                        <label for="logo-upload"
                            class="inline-block cursor-pointer bg-zinc-800 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Pilih Foto
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Daftar Menu</h2>
            <button type="button" onclick="addMenuForm()" class="cursor-pointer my-4 px-4 py-2 bg-green-600 text-white rounded">
                + Tambah Menu Baru
            </button>
            <div class="grids grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            </div>
        </div>
        <template id="menu-template2">
            <div class="p-4 border rounded space-y-3 bg-white dark:bg-zinc-800 shadow">
                <input type="hidden" name="menus[__INDEX__][id]" value="">

                <!-- Menu Image Upload + Preview -->
                <div>
                    <label class="block text-sm text-gray-600 dark:text-gray-300">Gambar Menu</label>
                    <div class="w-full h-40 overflow-hidden rounded bg-gray-100 flex items-center justify-center">
                        <img src="" data-index="__INDEX__" class="object-cover w-full h-full rounded hidden" />
                    </div>
                    <input type="file"
                        name="menus[__INDEX__][gambar]"
                        data-index="__INDEX__"
                        class="menu-image-input w-full border px-3 py-2 mt-4 cursor-pointer" />
                </div>

                <!-- Nama Menu -->
                <div>
                    <label class="block text-sm text-gray-600 dark:text-gray-300">Nama Menu</label>
                    <input type="text" name="menus[__INDEX__][nama_menu]" class="w-full rounded border px-3 py-2" required>
                </div>

                <!-- Harga -->
                <div>
                    <label class="block text-sm text-gray-600 dark:text-gray-300">Harga</label>
                    <input type="number" name="menus[__INDEX__][harga]" class="w-full rounded border px-3 py-2" required>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm text-gray-600 dark:text-gray-300">Deskripsi</label>
                    <textarea name="menus[__INDEX__][deskripsi]" rows="2" class="w-full rounded border px-3 py-2"></textarea>
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm text-gray-600 dark:text-gray-300">Kategori</label>
                    <select name="menus[__INDEX__][category_id]" class="w-full rounded border px-3 py-2">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </template>

        <button class="bg-blue-600 text-white mt-24 px-4 py-2 rounded cursor-pointer">Simpan</button>
    </form>
    <script>
        function previewLogo(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('logoPreview');

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.classList.remove('hidden');
            } else {
                preview.src = '';
                preview.classList.add('hidden');
            }
        }
        let menuIndex = 0;

        function addMenuForm() {
            const template = document.getElementById('menu-template2').innerHTML;
            const newHtml = template.replace(/__INDEX__/g, menuIndex);
            const container = document.querySelector('.grids');

            const div = document.createElement('div');
            div.innerHTML = newHtml.trim();
            container.appendChild(div.firstChild);

            menuIndex++;
        }
    </script>

</x-layouts.app>
