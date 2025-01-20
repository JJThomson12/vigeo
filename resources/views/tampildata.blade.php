<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="px-4 py-6">
        @auth('admin')
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('smp.create') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Tambah Data</a>
        </div>
        @endauth

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-2 px-4 border">Nama</th>
                        <th class="py-2 px-4 border">NPSN</th>
                        <th class="py-2 px-4 border">Alamat</th>
                        <th class="py-2 px-4 border">Desa/Kelurahan</th>
                        <th class="py-2 px-4 border">Kecamatan</th>
                        <th class="py-2 px-4 border">Kabupaten/Kota</th>
                        <th class="py-2 px-4 border">Kode Pos</th>
                        <th class="py-2 px-4 border">Status Sekolah</th>
                        <th class="py-2 px-4 border">Waktu Penyelenggaraan</th>
                        <th class="py-2 px-4 border">Telepon</th>
                        <th class="py-2 px-4 border">Email</th>
                        <th class="py-2 px-4 border">Website</th>
                        <th class="py-2 px-4 border">Latitude</th>
                        <th class="py-2 px-4 border">Longitude</th>
                        <th class="py-2 px-4 border">Gambar</th>
                        @auth('admin')
                        <th class="py-2 px-4 border">Aksi</th>
                        @endauth
                    </tr>
                </thead>
                <tbody>
                    @foreach($smp as $data)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border">{{ $data->nama }}</td>
                            <td class="py-2 px-4 border">{{ $data->npsn }}</td>
                            <td class="py-2 px-4 border">{{ $data->alamat }}</td>
                            <td class="py-2 px-4 border">{{ $data->desa_kelurahan }}</td>
                            <td class="py-2 px-4 border">{{ $data->kecamatan }}</td>
                            <td class="py-2 px-4 border">{{ $data->kabupaten_kota }}</td>
                            <td class="py-2 px-4 border">{{ $data->kode_pos }}</td>
                            <td class="py-2 px-4 border">{{ $data->status_sekolah }}</td>
                            <td class="py-2 px-4 border">{{ $data->waktu_penyelenggaraan }}</td>
                            <td class="py-2 px-4 border">{{ $data->telepon }}</td>
                            <td class="py-2 px-4 border">{{ $data->email }}</td>
                            <td class="py-2 px-4 border">{{ $data->website }}</td>
                            <td class="py-2 px-4 border">{{ $data->latitude }}</td>
                            <td class="py-2 px-4 border">{{ $data->longitude }}</td>
                            <td class="py-2 px-4 border">
                                @if($data->gambar)
                                    <img src="{{ asset('img/smp/' . $data->gambar) }}" alt="Gambar" class="w-16 h-16 object-cover">
                                @endif
                            </td>
                            @auth('admin')
                            <td class="py-2 px-4 border">
                                <div class="flex flex-col items-center">
                                    <a href="{{ route('smp.edit', $data->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-md mb-2">
                                        <img src="{{ asset('img/edit.png') }}" alt="Edit" class="w-4 h-4 inline">
                                    </a>
                                    <form action="{{ route('smp.destroy', $data->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md">
                                            <img src="{{ asset('img/bin.png') }}" alt="Delete" class="w-4 h-4 inline">
                                        </button>
                                    </form>
                                </div>
                            </td>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
