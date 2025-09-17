<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Siswa Kelas B3</h1>

        {{-- <a href="{{ route('students.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg mb-4 inline-block">
           + Tambah Siswa
        </a> --}}

        @if(session('success'))
            <div class="p-3 bg-green-100 text-green-700 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Nama Siswa</th>
                    <th class="px-4 py-2 border">Orang Tua</th>
                    <th class="px-4 py-2 border">Kelas</th>
                    <th class="px-4 py-2 border">Total Iuran</th>
                  @auth
                    @if(auth()->user()->role === 'admin')
                    <th class="px-4 py-2 border">Aksi</th>
                    @endif
                  @endauth
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border">
                        <a href="{{ route('students.show', ['student' => $student->id]) }}" class="text-blue-600 hover:underline">
                            {{ $student->nama }}
                        </a>
                    </td>
                    {{-- tampilkan nama dari user --}}
                    <td class="px-4 py-2 border text-center">{{ $student->parent->name ?? 'N/A' }}</td>                    
                    {{-- <td class="px-4 py-2 border text-center">{{ $student->parent_id }}</td> --}}
                    <td class="px-4 py-2 border text-center">{{ $student->kelas }}</td>
                    <td class="px-4 py-2 border text-center">
                        Rp{{ number_format($student->payments_sum_amount ?? 0, 0, ',', '.') }}
                    </td>
                  @auth
                    @if(auth()->user()->role === 'admin')
                    <td class="px-4 py-2 border space-x-2 text-center">
                        {{-- <a href="{{ route('students.edit', $student) }}" class="text-blue-600 cursor-not-allowed">Edit</a> --}}
                        <a href="#" class="text-blue-600 cursor-not-allowed">Edit</a>
                        <form action="{{ route('students.destroy', $student) }}" method="POST" class="inline"
                              onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600" disabled>Hapus</button>
                        </form>
                    </td>
                    @endif
                  @endauth
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
