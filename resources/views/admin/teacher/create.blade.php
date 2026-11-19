<x-admin.layout>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950/60 p-4">
        <section role="dialog" aria-modal="true" aria-labelledby="create-teacher-title"
            class="max-h-[calc(100vh-2rem)] w-full max-w-xl overflow-y-auto rounded-xl border border-gray-200 bg-white shadow-2xl dark:border-gray-700 dark:bg-gray-800">
            <div class="flex items-start justify-between gap-4 border-b border-gray-200 p-6 dark:border-gray-700">
                <div>
                    <h1 id="create-teacher-title" class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Teacher</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Isi data teacher pada form berikut.</p>
                </div>
                <a href="{{ route('admin.teacher.index') }}" aria-label="Tutup"
                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 6 12 12M18 6 6 18" />
                    </svg>
                </a>
            </div>

            <!-- Formulir untuk menyimpan data ke database -->
            <form action="{{ route('admin.teacher.store') }}" method="POST">
                @csrf

                <div class="space-y-5 p-6">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="teacher-name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input id="teacher-name" type="text" name="name" value="{{ old('name') }}" placeholder="Nama teacher" required
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="teacher-nip" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                            <input id="teacher-nip" type="text" name="nip" value="{{ old('nip') }}" inputmode="numeric" placeholder="Nomor induk pegawai" required
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            @error('nip')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="teacher-subject" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                            <select id="teacher-subject" name="subject_id" required
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                <option value="">Pilih subject</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" @selected(old('subject_id') == $subject->id)>
                                        {{ $subject->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('subject_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="teacher-start-date" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Tanggal Mulai</label>
                            <input id="teacher-start-date" type="date" name="start_date" value="{{ old('start_date') }}" required
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            @error('start_date')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col-reverse justify-end gap-3 border-t border-gray-200 pt-5 sm:flex-row dark:border-gray-700">
                        <a href="{{ route('admin.teacher.index') }}"
                            class="rounded-lg border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">Batal</a>
                        <button type="submit"
                            class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Simpan</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</x-admin.layout>
