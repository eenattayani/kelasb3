<x-app-layout>
    <div class="max-w-lg mx-auto p-6">
        <h1 class="text-xl font-semibold mb-6">✏️ Ubah Nominal Pekan</h1>

        <form method="post" action="{{ route('feeweeks.update', $feeweek) }}" class="space-y-4">
            @csrf
            @method('put')

            <div>
                <label class="block text-sm font-medium text-gray-700">Tahun</label>
                <input type="text" value="{{ $feeweek->year }}" disabled
                       class="w-full rounded border-gray-300 shadow-sm bg-gray-100">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Bulan</label>
                <input type="text" value="{{ $feeweek->month }}" disabled
                       class="w-full rounded border-gray-300 shadow-sm bg-gray-100">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Pekan</label>
                <input type="text" value="{{ $feeweek->week_of_month }}" disabled
                       class="w-full rounded border-gray-300 shadow-sm bg-gray-100">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Nominal (Rp)</label>
                <input type="number" name="due_amount" value="{{ old('due_amount', $feeweek->due_amount) }}"
                       class="w-full rounded border-gray-300 shadow-sm">
                @error('due_amount') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
            </div>

            <button class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700">
                Simpan Perubahan
            </button>
        </form>
    </div>
</x-app-layout>
