<x-layouts.app :title="'Edit Toko & Menunya'">
    <form method="POST" action="{{ route('admin.tokos.update', $toko) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PUT')

        <!-- Toko Info -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Informasi Toko</h2>
            <div>
                <label class="block">Nama Toko</label>
                <input type="text" name="nama_toko" value="{{ $toko->nama_toko }}" class="w-full rounded border px-3 py-2" required>
            </div>
            <div>
                <label class="block">Deskripsi</label>
                <textarea name="deskripsi" class="w-full rounded border px-3 py-2">{{ $toko->deskripsi }}</textarea>
            </div>
            <div>
                <label class="block">No Telepon</label>
                <input type="text" name="no_telepon" value="{{ $toko->no_telepon }}" class="w-full rounded border px-3 py-2">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Foto</label>

                <div class="flex items-center gap-4">
                    <img id="logo-preview"
                        src="{{ $toko->logo ? asset('storage/' . $toko->logo) : asset('default-toko-logo.webp') }}"
                        alt="Preview Logo"
                        class="h-36 w-36 object-cover rounded border border-gray-300 dark:border-zinc-700">

                    <div>
                        <input id="logo-upload" name="logo" type="file" class="sr-only" accept="image/*">

                        <label for="logo-upload"
                            class="inline-block cursor-pointer bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                            Pilih Foto
                        </label>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <button type="button" onclick="addMenuForm()" class="cursor-pointer mt-4 px-4 py-2 bg-green-600 text-white rounded">
                + Tambah Menu Baru
            </button>
        </div>
        <!-- Menu Editing -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Daftar Menu</h2>

            <div class="space-y-6">
                {{-- New Menus Form Placeholder --}}
                <h3 class="text-md font-medium text-gray-700 dark:text-white">Menu Baru</h3>
                <div id="new-menus-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>

                {{-- Existing Menus Grouped by Category --}}
                @php
                    $menusByCategory = $toko->menus->groupBy(fn($menu) => optional($menu->category)->nama_kategori ?? 'Tanpa Kategori');
                @endphp

                @foreach ($menusByCategory as $categoryName => $menus)
                    <div class="space-y-2">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">{{ $categoryName }}</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 p-6 bg-zinc-200 rounded-lg">
                            @foreach ($menus as $i => $menu)
                                <div class="p-4 border rounded space-y-3 bg-white dark:bg-zinc-800 shadow">
                                    <input type="hidden" name="menus[{{ $loop->parent->index . '-' . $loop->index }}][id]" value="{{ $menu->id }}">

                                    {{-- Image --}}
                                    <div>
                                        <label class="block text-sm text-gray-600 dark:text-gray-300">Gambar Menu</label>
                                        <div class="w-full h-40 overflow-hidden rounded bg-gray-100 flex items-center justify-center">
                                            @if ($menu->gambar)
                                                <img src="{{ asset('storage/' . $menu->gambar) }}"
                                                    data-index="{{ $loop->parent->index . '-' . $loop->index }}"
                                                    class="object-cover w-full h-full rounded" />
                                            @else
                                                <img src=""
                                                    data-index="{{ $loop->parent->index . '-' . $loop->index }}"
                                                    class="object-cover w-full h-full rounded hidden" />
                                            @endif
                                        </div>
                                        <input type="file"
                                            name="menus[{{ $loop->parent->index . '-' . $loop->index }}][gambar]"
                                            data-index="{{ $loop->parent->index . '-' . $loop->index }}"
                                            class="menu-image-input w-full border px-3 py-2 mt-4 cursor-pointer">
                                    </div>

                                    {{-- Nama, Harga, Deskripsi, Kategori --}}
                                    <div>
                                        <label class="block text-sm text-gray-600 dark:text-gray-300">Nama Menu</label>
                                        <input type="text" name="menus[{{ $loop->parent->index . '-' . $loop->index }}][nama_menu]" value="{{ $menu->nama_menu }}"
                                            class="w-full rounded border px-3 py-2" required>
                                    </div>

                                    <div>
                                        <label class="block text-sm text-gray-600 dark:text-gray-300">Harga</label>
                                        <input type="number" name="menus[{{ $loop->parent->index . '-' . $loop->index }}][harga]" value="{{ $menu->harga }}"
                                            class="w-full rounded border px-3 py-2" required>
                                    </div>

                                    <div>
                                        <label class="block text-sm text-gray-600 dark:text-gray-300">Deskripsi</label>
                                        <textarea name="menus[{{ $loop->parent->index . '-' . $loop->index }}][deskripsi]" rows="2"
                                            class="w-full rounded border px-3 py-2">{{ $menu->deskripsi }}</textarea>
                                    </div>

                                    <div>
                                        <label class="block text-sm text-gray-600 dark:text-gray-300">Kategori</label>
                                        <select name="menus[{{ $loop->parent->index . '-' . $loop->index }}][category_id]" class="w-full rounded border px-3 py-2">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $menu->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->nama_kategori }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <template id="menu-template2">
                <div class="p-4 border rounded space-y-3 bg-white dark:bg-zinc-800 shadow">
                    <input type="hidden" name="menus[__INDEX__][id]" value="">

                    <!-- Menu Image (Preview on top) -->
                    <div>
                        <label class="block text-sm text-gray-600 dark:text-gray-300">Gambar Menu</label>
                        <div class="w-full h-40 overflow-hidden rounded bg-gray-100 flex items-center justify-center">
                            <img src="" data-index="__INDEX__" class="object-cover w-full h-full rounded hidden" />
                        </div>
                        <div class="cursor-pointer">
                            <input type="file"
                                name="menus[__INDEX__][gambar]"
                                data-index="__INDEX__"
                                class="menu-image-input w-full border px-3 py-2 mt-4 cursor-pointer">
                        </div>
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

        </div>

        <button class="bg-blue-600 text-white px-6 py-2 rounded cursor-pointer">Update Toko & Menunya</button>
    </form>
    <script>
        document.getElementById('logo-upload').addEventListener('change', function (event) {
            const preview = document.getElementById('logo-preview');
            const file = event.target.files[0];

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
        let menuIndex = {{ count($toko->menus) }};

        function addMenuForm() {
            const template = document.getElementById('menu-template2').innerHTML;
            const newHtml = template.replace(/__INDEX__/g, menuIndex);
            const container = document.getElementById('new-menus-container');

            const div = document.createElement('div');
            div.innerHTML = newHtml.trim();
            container.prepend(div.firstChild);
            attachImagePreview(menuIndex);

            menuIndex++;
        }

        function attachImagePreview(index) {
            const input = document.querySelector(`input[data-index="${index}"]`);
            const img = document.querySelector(`img[data-index="${index}"]`);

            if (!input || !img) return;

            input.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file && file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        img.src = e.target.result;
                        img.classList.remove('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        for (let i = 0; i < menuIndex; i++) {
            attachImagePreview(i);
        }
    </script>
</x-layouts.app>
