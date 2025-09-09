<x-app-layout>
    <div class="max-w-3xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-6">Edit Data Siswa</h1>

        @if ($errors->any())
            <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
                <strong>Terjadi kesalahan:</strong>
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('students.update', $student) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name', $student->nama) }}"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="parent_name" class="block text-sm font-medium text-gray-700">Nama Orang Tua</label>
                <input type="text" name="parent_name" id="parent_name"
                       value="{{ old('parent_name', $student->parent_id) }}"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-700">Kelas</label>
                <input type="text" name="kelas" id="kelas"
                       value="{{ old('kelas', $student->kelas) }}"
                       class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('students.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">Batal</a>
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
