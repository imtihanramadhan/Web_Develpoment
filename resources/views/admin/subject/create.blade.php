<x-admin.layout>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-gray-950/60 p-4">
        <section role="dialog" aria-modal="true" aria-labelledby="create-subject-title"
            class="max-h-[calc(100vh-2rem)] w-full max-w-xl overflow-y-auto rounded-xl border border-gray-200 bg-white shadow-2xl dark:border-gray-700 dark:bg-gray-800">
            <div class="flex items-start justify-between gap-4 border-b border-gray-200 p-6 dark:border-gray-700">
                <div>
                    <h1 id="create-subject-title" class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Subject</h1>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Isi data subject pada form berikut.</p>
                </div>
                <a href="{{ route('admin.subject.index') }}" aria-label="Tutup"
                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6 6 12 12M18 6 6 18" />
                    </svg>
                </a>
            </div>

            <form action="{{ route('admin.subject.store') }}" method="POST">
                @csrf

                <div class="space-y-5 p-6">
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="subject-name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input id="subject-name" type="text" name="name" value="{{ old('name') }}" placeholder="Nama subject" required
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="subject-teacher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">Teacher (opsional)</label>
                            <select id="subject-teacher" name="teacher_id"
                                class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                                <option value="">Pilih teacher</option>
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" @selected(old('teacher_id') == $teacher->id)>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col-reverse justify-end gap-3 border-t border-gray-200 pt-5 sm:flex-row dark:border-gray-700">
                        <a href="{{ route('admin.subject.index') }}"
                            class="rounded-lg border border-gray-300 px-4 py-2 text-center text-sm font-medium text-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-700">Batal</a>
                        <button type="submit"
                            class="rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 dark:bg-blue-600 dark:hover:bg-blue-700">Simpan</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
</x-admin.layout>
