<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="px-4 py-6">
        <div class="flex">
            <div class="w-full pr-4">
                <div id="map" style="width: 100%; height: 800px; border: 2px solid #000;"></div>
            </div>
            <div class="w-1/3 ">
                <form id="form1" action="{{ isset($smp) ? route('smp.update', $smp->id) : route('smp.store') }}" method="POST" enctype="multipart/form-data" class="bg-gray-300 p-6 rounded-lg shadow-lg mt-4">
                    @csrf
                    @if(isset($smp))
                        @method('PUT')
                    @endif
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text" id="nama" name="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->nama ?? '' }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="npsn" class="block text-sm font-medium text-gray-700">NPSN</label>
                            <input type="text" id="npsn" name="npsn" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->npsn ?? '' }}" required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" name="alamat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" required>{{ $smp->alamat ?? '' }}</textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <label for="desa_kelurahan" class="block text-sm font-medium text-gray-700">Desa/Kelurahan</label>
                            <input type="text" id="desa_kelurahan" name="desa_kelurahan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->desa_kelurahan ?? '' }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                            <input type="text" id="kecamatan" name="kecamatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->kecamatan ?? '' }}" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <label for="kabupaten_kota" class="block text-sm font-medium text-gray-700">Kabupaten/Kota</label>
                            <input type="text" id="kabupaten_kota" name="kabupaten_kota" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->kabupaten_kota ?? '' }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                            <input type="text" id="kode_pos" name="kode_pos" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->kode_pos ?? '' }}" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <label for="status_sekolah" class="block text-sm font-medium text-gray-700">Status Sekolah</label>
                            <input type="text" id="status_sekolah" name="status_sekolah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->status_sekolah ?? '' }}" required>
                        </div>
                        <div class="mb-6">
                            <label for="waktu_penyelenggaraan" class="block text-sm font-medium text-gray-700">Waktu Penyelenggaraan</label>
                            <input type="text" id="waktu_penyelenggaraan" name="waktu_penyelenggaraan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->waktu_penyelenggaraan ?? '' }}" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <label for="telepon" class="block text-sm font-medium text-gray-700">Telepon</label>
                            <input type="text" id="telepon" name="telepon" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->telepon ?? '' }}">
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email" name="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->email ?? '' }}">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="website" class="block text-sm font-medium text-gray-700">Website</label>
                        <input type="text" id="website" name="website" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->website ?? '' }}">
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-6">
                            <label for="latitude" class="block text-sm font-medium text-gray-700">Latitude</label>
                            <input type="text" id="latitude" name="latitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->latitude ?? '' }}">
                        </div>
                        <div class="mb-6">
                            <label for="longitude" class="block text-sm font-medium text-gray-700">Longitude</label>
                            <input type="text" id="longitude" name="longitude" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100" value="{{ $smp->longitude ?? '' }}">
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="gambar" class="block text-sm font-medium text-gray-700">Gambar</label>
                        <input type="file" id="gambar" name="gambar" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-lg bg-gray-100">
                        @if(isset($smp) && $smp->gambar)
                        <img src="{{ asset('img/smp/' . $smp->gambar) }}" alt="Gambar SMP" class="w-16 h-16 object-cover mt-2">
                        @endif
                    </div>
                    <div class="mb-6">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ isset($smp) ? 'Update' : 'Save' }}</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            var grupsmp = L.layerGroup();

            var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11'
            });

            var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                    '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-v9'
            });

            var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });

            var map = L.map('map', {
                center: [-0.22356305563346465, 100.63123749554455],
                zoom: 15,
                layers: [peta3, grupsmp]
            });

            var baseLayers = {
                "Grayscale": peta1,
                "Satellite": peta2,
                "Streets": peta3
            };

            var overlays = {
                "SMP": grupsmp
            };

            L.control.layers(baseLayers, overlays).addTo(map);

            var drawnItems = new L.FeatureGroup();
            map.addLayer(drawnItems);
            var drawControl = new L.Control.Draw({
                draw: {
                    polygon: false,
                    marker: true,
                    circle: false,
                    circlemarker: false,
                    rectangle: false,
                    polyline: false,
                },
                edit: {
                    featureGroup: drawnItems
                }
            });
            map.addControl(drawControl);

            map.on('draw:created', function(event) {
                var layer = event.layer;
                var feature = layer.feature = layer.feature || {};
                feature.type = feature.type || "Feature";
                var props = feature.properties = feature.properties || {};
                drawnItems.addLayer(layer);
                $("[name=denah_geojson]").val(JSON.stringify(drawnItems.toGeoJSON()));
            });

            map.on('draw:edited', function(e) {
                $("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
            });

            map.on('draw:deleted', function(e) {
                $("[name=denah_geojson]").html(JSON.stringify(drawnItems.toGeoJSON()));
            });

            var marker;

            function updateMarker() {
                var lat = parseFloat(document.getElementById('latitude').value);
                var lng = parseFloat(document.getElementById('longitude').value);

                if (!isNaN(lat) && !isNaN(lng)) {
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    marker = L.marker([lat, lng]).addTo(map);
                    map.setView([lat, lng], 15);
                }
            }

            document.getElementById('latitude').addEventListener('input', updateMarker);
            document.getElementById('longitude').addEventListener('input', updateMarker);
        </script>
    </div>
</x-layout>
<script>
    map.on('click', function(e) {
        var lat = e.latlng.lat;
        var lng = e.latlng.lng;

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;

        if (marker) {
            map.removeLayer(marker);
        }
        marker = L.marker([lat, lng]).addTo(map);
    });
</script>
