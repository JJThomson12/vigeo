<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <div class="text-center mt-10">
        <div class="content">
            <div id="map" style="width: 100%; height: 800px; border: 2px solid #000;"></div>
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
                center: [-0.22458375257312002, 100.63082921379721],
                zoom: 14,
                layers: [peta3, grupsmp]
            });

            var baseLayers = {
                "Grayscale": peta1,
                "Satellite": peta2,
                "Streets": peta3
            };

            var overlays = {
                "smp": grupsmp,
            };

            L.control.layers(baseLayers, overlays).addTo(map);

            fetch('/api/smp')
                .then(response => response.json())
                .then(data => {
                    data.forEach(smp => {
                        if (smp.latitude && smp.longitude) {
                            var marker = L.marker([smp.latitude, smp.longitude]).addTo(grupsmp);
                            marker.bindPopup(`
                                <div>
                                    ${smp.gambar ? `<img src="/img/smp/${smp.gambar}" alt="Gambar SMP" style="width: 100%; height: auto;">` : ''}
                                    <br>
                                    <h3><strong>${smp.nama}</strong></h3>
                                    <p><strong>NPSN:</strong> ${smp.npsn}</p>
                                    <p><strong>Alamat:</strong> ${smp.alamat}</p>
                                    <p><strong>Desa/Kelurahan:</strong> ${smp.desa_kelurahan}</p>
                                    <p><strong>Kecamatan:</strong> ${smp.kecamatan}</p>
                                    <p><strong>Kabupaten/Kota:</strong> ${smp.kabupaten_kota}</p>
                                    <p><strong>Kode Pos:</strong> ${smp.kode_pos}</p>
                                    <p><strong>Status Sekolah:</strong> ${smp.status_sekolah}</p>
                                    <p><strong>Waktu Penyelenggaraan:</strong> ${smp.waktu_penyelenggaraan}</p>
                                    <p><strong>Telepon:</strong> ${smp.telepon}</p>
                                    <p><strong>Email:</strong> ${smp.email}</p>
                                    <p><strong>Website:</strong> ${smp.website}</p>
                                </div>
                            `);
                        }
                    });
                });
        </script>
    </div>
</x-layout>
