<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessField;
use Illuminate\Support\Str;

class BusinessFieldSeeder extends Seeder
{
    public function run(): void
    {
        $fields = [
            [
                'name' => 'Bangunan Gedung',
                'slug' => 'bangunan-gedung',
                'icon' => 'building-office-2',
                'hero_image' => 'https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&q=80', // Modern office building
                'short_description' => 'Pembangunan gedung perkantoran, apartemen, dan fasilitas komersial',
                'description' => 'Spesialisasi kami dalam pembangunan gedung bertingkat meliputi gedung perkantoran, apartemen, hotel, mall, dan berbagai fasilitas komersial lainnya dengan standar kualitas internasional.',
                'long_description' => 'Kami memiliki pengalaman lebih dari 20 tahun dalam pembangunan gedung bertingkat tinggi. Tim kami terdiri dari engineer bersertifikat, arsitek profesional, dan tenaga kerja terampil yang siap mewujudkan gedung impian Anda dengan standar kualitas terbaik. Setiap proyek dikerjakan dengan perencanaan matang, pengawasan ketat, dan menggunakan material berkualitas tinggi untuk memastikan hasil yang maksimal.',
                'services' => [
                    ['title' => 'Gedung Perkantoran', 'description' => 'Desain dan konstruksi gedung perkantoran modern dengan sistem MEP terintegrasi', 'icon' => 'building-office'],
                    ['title' => 'Apartemen & Kondominium', 'description' => 'Pembangunan hunian vertikal berkualitas tinggi dengan fasilitas lengkap', 'icon' => 'home-modern'],
                    ['title' => 'Hotel & Resort', 'description' => 'Konstruksi hotel dan resort dengan desain mewah dan berkelanjutan', 'icon' => 'building-library'],
                    ['title' => 'Mall & Retail', 'description' => 'Pembangunan pusat perbelanjaan dan fasilitas retail modern', 'icon' => 'shopping-bag'],
                    ['title' => 'Rumah Sakit', 'description' => 'Konstruksi fasilitas kesehatan dengan standar internasional', 'icon' => 'heart'],
                    ['title' => 'Gedung Pendidikan', 'description' => 'Pembangunan sekolah, kampus, dan fasilitas pendidikan', 'icon' => 'academic-cap'],
                ],
                'process_steps' => [
                    ['step' => 1, 'title' => 'Survey & Analisa', 'description' => 'Survey lokasi, analisa tanah, dan studi kelayakan proyek', 'icon' => 'map'],
                    ['step' => 2, 'title' => 'Perencanaan & Desain', 'description' => 'Desain arsitektur, struktur, dan MEP sesuai kebutuhan', 'icon' => 'pencil-square'],
                    ['step' => 3, 'title' => 'Perizinan', 'description' => 'Pengurusan IMB dan perizinan terkait', 'icon' => 'document-check'],
                    ['step' => 4, 'title' => 'Konstruksi', 'description' => 'Pelaksanaan pembangunan dengan pengawasan ketat', 'icon' => 'wrench-screwdriver'],
                    ['step' => 5, 'title' => 'Finishing', 'description' => 'Pekerjaan finishing dan instalasi MEP', 'icon' => 'paint-brush'],
                    ['step' => 6, 'title' => 'Serah Terima', 'description' => 'Inspeksi akhir dan serah terima proyek', 'icon' => 'key'],
                ],
                'advantages' => [
                    ['title' => 'Berpengalaman 20+ Tahun', 'description' => 'Pengalaman menangani proyek gedung bertingkat tinggi hingga 30 lantai', 'icon' => 'trophy'],
                    ['title' => 'Tim Professional', 'description' => 'Engineer dan arsitek bersertifikat internasional', 'icon' => 'users'],
                    ['title' => 'Teknologi Modern', 'description' => 'Menggunakan metode konstruksi dan teknologi terkini', 'icon' => 'cpu-chip'],
                    ['title' => 'Garansi Struktur', 'description' => 'Garansi struktur hingga 3 tahun', 'icon' => 'shield-check'],
                ],
                'faq' => [
                    ['question' => 'Berapa lama waktu pembangunan gedung 10 lantai?', 'answer' => 'Untuk gedung 10 lantai, estimasi waktu pembangunan sekitar 18-24 bulan, tergantung kompleksitas desain dan kondisi lapangan.'],
                    ['question' => 'Apakah sudah termasuk perizinan IMB?', 'answer' => 'Ya, kami membantu proses pengurusan IMB dan perizinan lainnya sebagai bagian dari layanan kami.'],
                    ['question' => 'Bagaimana sistem pembayarannya?', 'answer' => 'Sistem pembayaran bertahap sesuai progres pekerjaan: 30% DP, 40% saat progres 50%, 30% setelah selesai.'],
                    ['question' => 'Apakah bisa revisi desain di tengah pengerjaan?', 'answer' => 'Revisi desain minor masih dimungkinkan dengan penyesuaian biaya. Namun revisi mayor tidak disarankan karena dapat mengganggu jadwal.'],
                ],
                'is_active' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Jalan & Jembatan',
                'slug' => 'jalan-jembatan',
                'icon' => 'map',
                'hero_image' => 'https://images.unsplash.com/photo-1569396116180-210c182bedb8?w=1920&q=80', // Bridge construction
                'short_description' => 'Konstruksi jalan raya, jembatan, dan infrastruktur transportasi',
                'description' => 'Pembangunan infrastruktur jalan dan jembatan dengan teknologi modern, mulai dari jalan desa hingga jalan tol, serta jembatan dengan berbagai tipe dan kapasitas.',
                'long_description' => 'Dengan pengalaman menangani proyek infrastruktur transportasi skala besar, kami siap membangun jalan dan jembatan yang aman, kokoh, dan tahan lama. Tim kami dilengkapi dengan peralatan modern dan expertise dalam soil mechanics, struktur beton, dan manajemen lalu lintas. Setiap proyek dikerjakan sesuai standar nasional dan internasional untuk memastikan keamanan dan kenyamanan pengguna jalan.',
                'services' => [
                    ['title' => 'Jalan Raya', 'description' => 'Konstruksi jalan raya provinsi dan kabupaten dengan berbagai jenis perkerasan', 'icon' => 'map'],
                    ['title' => 'Jalan Tol', 'description' => 'Pembangunan jalan tol dengan standar internasional', 'icon' => 'truck'],
                    ['title' => 'Jembatan Beton', 'description' => 'Konstruksi jembatan beton bertulang dengan kapasitas hingga 500 ton', 'icon' => 'building-library'],
                    ['title' => 'Jembatan Baja', 'description' => 'Pembangunan jembatan rangka baja untuk bentang panjang', 'icon' => 'cube'],
                    ['title' => 'Flyover & Underpass', 'description' => 'Konstruksi flyover dan underpass untuk mengatasi kemacetan', 'icon' => 'arrows-right-left'],
                    ['title' => 'Perbaikan Jalan', 'description' => 'Overlay, rehabilitasi, dan pemeliharaan jalan existing', 'icon' => 'wrench-screwdriver'],
                ],
                'process_steps' => [
                    ['step' => 1, 'title' => 'Survey Topografi', 'description' => 'Pengukuran medan dan analisa kondisi tanah', 'icon' => 'map'],
                    ['step' => 2, 'title' => 'Desain Engineering', 'description' => 'Perencanaan geometrik, struktur, dan drainase', 'icon' => 'calculator'],
                    ['step' => 3, 'title' => 'Pembebasan Lahan', 'description' => 'Koordinasi pembebasan lahan dengan pihak terkait', 'icon' => 'home'],
                    ['step' => 4, 'title' => 'Pekerjaan Tanah', 'description' => 'Cut & fill, pemadatan, dan pekerjaan tanah dasar', 'icon' => 'cube'],
                    ['step' => 5, 'title' => 'Konstruksi', 'description' => 'Pekerjaan perkerasan, struktur jembatan, dan drainase', 'icon' => 'wrench-screwdriver'],
                    ['step' => 6, 'title' => 'Finishing & Marking', 'description' => 'Marka jalan, rambu, dan perlengkapan jalan', 'icon' => 'check-badge'],
                ],
                'advantages' => [
                    ['title' => 'Alat Berat Lengkap', 'description' => 'Kepemilikan alat berat modern untuk efisiensi waktu', 'icon' => 'truck'],
                    ['title' => 'Expertise Soil Mechanics', 'description' => 'Tim ahli geoteknik bersertifikat', 'icon' => 'academic-cap'],
                    ['title' => 'Quality Control Ketat', 'description' => 'Lab testing material dan pengawasan mutu', 'icon' => 'beaker'],
                    ['title' => 'Sertifikat SBU Jalan', 'description' => 'Memiliki SBU bidang jalan dan jembatan', 'icon' => 'document-check'],
                ],
                'faq' => [
                    ['question' => 'Berapa lama konstruksi jalan 5 km?', 'answer' => 'Untuk jalan 5 km dengan lebar 7 meter, estimasi waktu 6-9 bulan tergantung kondisi cuaca dan medan.'],
                    ['question' => 'Jenis perkerasan apa yang paling cocok?', 'answer' => 'Untuk lalu lintas berat disarankan rigid pavement (beton), untuk lalu lintas sedang bisa menggunakan aspal hotmix.'],
                    ['question' => 'Apakah ada garansi untuk jalan yang dibangun?', 'answer' => 'Ya, kami memberikan garansi 2 tahun untuk struktur perkerasan jalan.'],
                    ['question' => 'Bagaimana dengan sistem drainase?', 'answer' => 'Sistem drainase merupakan bagian integral dari konstruksi jalan dan sudah termasuk dalam paket pekerjaan.'],
                ],
                'is_active' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'Irigasi & Bendungan',
                'slug' => 'irigasi-bendungan',
                'icon' => 'beaker',
                'hero_image' => 'https://images.unsplash.com/photo-1549366021-9f761d450615?w=1920&q=80', // Dam/water infrastructure
                'short_description' => 'Pembangunan sistem irigasi, bendungan, dan infrastruktur air',
                'description' => 'Konstruksi sistem irigasi teknis, bendungan, tanggul, dan berbagai infrastruktur pengelolaan sumber daya air untuk pertanian dan mitigasi bencana.',
                'long_description' => 'Kami berpengalaman dalam pembangunan infrastruktur pengairan skala besar, mulai dari bendungan, waduk, jaringan irigasi, hingga sistem drainase. Tim kami memahami prinsip hidrologi, mekanika fluida, dan konstruksi struktur beton massa. Setiap proyek dirancang dengan perhitungan teknis yang akurat untuk memastikan keamanan dan fungsi optimal dalam jangka panjang.',
                'services' => [
                    ['title' => 'Bendungan', 'description' => 'Konstruksi bendungan untuk PLTA, irigasi, dan pengendali banjir', 'icon' => 'beaker'],
                    ['title' => 'Waduk & Embung', 'description' => 'Pembangunan waduk dan embung untuk cadangan air', 'icon' => 'cube-transparent'],
                    ['title' => 'Jaringan Irigasi', 'description' => 'Saluran irigasi primer, sekunder, dan tersier', 'icon' => 'arrows-pointing-out'],
                    ['title' => 'Bangunan Pengendali', 'description' => 'Pintu air, spillway, dan bangunan pengendali debit', 'icon' => 'cog'],
                    ['title' => 'Tanggul Sungai', 'description' => 'Normalisasi sungai dan pembangunan tanggul pengaman', 'icon' => 'shield-check'],
                    ['title' => 'Drainase', 'description' => 'Sistem drainase perkotaan dan kawasan industri', 'icon' => 'funnel'],
                ],
                'process_steps' => [
                    ['step' => 1, 'title' => 'Studi Hidrologi', 'description' => 'Analisa curah hujan, debit sungai, dan kebutuhan air', 'icon' => 'chart-bar'],
                    ['step' => 2, 'title' => 'Desain Hidraulika', 'description' => 'Perhitungan dimensi struktur dan sistem pengaliran', 'icon' => 'calculator'],
                    ['step' => 3, 'title' => 'Investigasi Geoteknik', 'description' => 'Penyelidikan tanah dan batuan dasar', 'icon' => 'magnifying-glass'],
                    ['step' => 4, 'title' => 'Konstruksi Pondasi', 'description' => 'Pekerjaan pondasi dan grouting', 'icon' => 'cube'],
                    ['step' => 5, 'title' => 'Konstruksi Struktur', 'description' => 'Pekerjaan beton massa dan struktur utama', 'icon' => 'building-office-2'],
                    ['step' => 6, 'title' => 'Testing & Commissioning', 'description' => 'Uji coba sistem dan serah terima', 'icon' => 'check-circle'],
                ],
                'advantages' => [
                    ['title' => 'Expertise Hidrologi', 'description' => 'Tim ahli hidrologi dan hidraulika bersertifikat', 'icon' => 'academic-cap'],
                    ['title' => 'Pengalaman Bendungan', 'description' => 'Sudah menangani 5+ proyek bendungan', 'icon' => 'trophy'],
                    ['title' => 'Peralatan Khusus', 'description' => 'Memiliki peralatan khusus untuk pekerjaan grouting', 'icon' => 'wrench'],
                    ['title' => 'Sertifikat SBU Irigasi', 'description' => 'Memiliki SBU bidang irigasi dan pengairan', 'icon' => 'document-check'],
                ],
                'faq' => [
                    ['question' => 'Berapa lama pembangunan bendungan?', 'answer' => 'Tergantung tinggi dan volume, bendungan kecil (10m) memakan waktu 2-3 tahun, bendungan besar (50m+) bisa 5-7 tahun.'],
                    ['question' => 'Apa saja yang termasuk dalam sistem irigasi?', 'answer' => 'Meliputi bangunan utama (bendung/intake), saluran pembawa, bangunan bagi, dan saluran tersier ke sawah.'],
                    ['question' => 'Bagaimana dengan analisa keamanan bendungan?', 'answer' => 'Kami melakukan analisa stabilitas lereng, rembesan, dan gempa sesuai standar SNI dan internasional.'],
                    ['question' => 'Apakah termasuk O&M manual?', 'answer' => 'Ya, kami menyediakan operation & maintenance manual lengkap beserta training untuk operator.'],
                ],
                'is_active' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'Pelabuhan & Dermaga',
                'slug' => 'pelabuhan-dermaga',
                'icon' => 'globe-asia-australia',
                'hero_image' => 'https://images.unsplash.com/photo-1605647540924-852290f6b0d5?w=1920&q=80', // Port/harbor
                'short_description' => 'Konstruksi pelabuhan laut, dermaga, dan fasilitas maritim',
                'description' => 'Pembangunan pelabuhan, dermaga, jetty, dan berbagai fasilitas maritim dengan teknologi modern untuk mendukung aktivitas logistik dan transportasi laut.',
                'long_description' => 'Pengalaman kami dalam konstruksi maritim mencakup pelabuhan laut, dermaga minyak dan gas, jetty batubara, dan fasilitas kepelabuhanan lainnya. Tim kami memahami karakteristik struktur maritim, pengaruh gelombang dan arus, serta teknik konstruksi di lingkungan laut yang menantang.',
                'services' => [
                    ['title' => 'Pelabuhan Umum', 'description' => 'Konstruksi pelabuhan untuk kapal penumpang dan kargo', 'icon' => 'truck'],
                    ['title' => 'Dermaga Minyak & Gas', 'description' => 'Pembangunan jetty untuk loading/unloading migas', 'icon' => 'fire'],
                    ['title' => 'Dermaga Batubara', 'description' => 'Konstruksi jetty dan stockpile batubara', 'icon' => 'cube'],
                    ['title' => 'Breakwater', 'description' => 'Pembangunan pemecah gelombang dan tanggul laut', 'icon' => 'shield-check'],
                    ['title' => 'Pekerjaan Reklamasi', 'description' => 'Reklamasi pantai dan pengurugan lahan', 'icon' => 'map'],
                    ['title' => 'Fasilitas Pelabuhan', 'description' => 'Gudang, crane, dan peralatan bongkar muat', 'icon' => 'building-office'],
                ],
                'process_steps' => [
                    ['step' => 1, 'title' => 'Survey Batimetri', 'description' => 'Pemetaan dasar laut dan kondisi perairan', 'icon' => 'map'],
                    ['step' => 2, 'title' => 'Analisa Gelombang', 'description' => 'Studi gelombang, arus, dan pasang surut', 'icon' => 'chart-bar'],
                    ['step' => 3, 'title' => 'Desain Struktur', 'description' => 'Perencanaan struktur tahan gelombang dan korosi', 'icon' => 'pencil-square'],
                    ['step' => 4, 'title' => 'Pekerjaan Pondasi', 'description' => 'Pemancangan tiang dan pekerjaan pondasi', 'icon' => 'wrench-screwdriver'],
                    ['step' => 5, 'title' => 'Konstruksi Struktur', 'description' => 'Pekerjaan deck, fender, dan bollard', 'icon' => 'cube'],
                    ['step' => 6, 'title' => 'Instalasi Fasilitas', 'description' => 'Pemasangan crane, lighting, dan utilitas', 'icon' => 'light-bulb'],
                ],
                'advantages' => [
                    ['title' => 'Pengalaman Maritim', 'description' => 'Berpengalaman 15+ tahun di konstruksi maritim', 'icon' => 'trophy'],
                    ['title' => 'Peralatan Marine', 'description' => 'Memiliki floating crane dan peralatan marine', 'icon' => 'truck'],
                    ['title' => 'Tim Diving', 'description' => 'Tim penyelam profesional bersertifikat', 'icon' => 'users'],
                    ['title' => 'Sertifikat Marine', 'description' => 'Memiliki SBU bidang bangunan kelautan', 'icon' => 'document-check'],
                ],
                'faq' => [
                    ['question' => 'Berapa kapasitas dermaga yang bisa dibangun?', 'answer' => 'Kami mampu membangun dermaga dengan kapasitas hingga 100.000 DWT untuk kapal besar.'],
                    ['question' => 'Bagaimana mengatasi korosi di struktur maritim?', 'answer' => 'Kami menggunakan beton marine grade, cathodic protection, dan coating khusus anti korosi.'],
                    ['question' => 'Berapa lama konstruksi jetty batubara?', 'answer' => 'Untuk jetty batubara kapasitas 3.000 ton/jam, estimasi waktu konstruksi 12-18 bulan.'],
                    ['question' => 'Apakah bisa kerja saat musim badai?', 'answer' => 'Kami menyesuaikan jadwal dengan kondisi cuaca dan gelombang untuk keamanan pekerja.'],
                ],
                'is_active' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'Pembangkit Listrik',
                'slug' => 'pembangkit-listrik',
                'icon' => 'bolt',
                'hero_image' => 'https://images.unsplash.com/photo-1473341304170-971dccb5ac1e?w=1920&q=80', // Power plant
                'short_description' => 'Konstruksi pembangkit listrik dan infrastruktur energi',
                'description' => 'Pembangunan pembangkit listrik tenaga air, panas bumi, dan energi terbarukan lainnya untuk mendukung ketahanan energi nasional.',
                'long_description' => 'Kami memiliki expertise dalam konstruksi pembangkit listrik skala kecil hingga besar, termasuk PLTA, PLTMH, dan PLTP. Tim kami memahami sistem mekanikal-elektrikal, turbin, generator, dan switchyard. Setiap proyek dikerjakan dengan standar keamanan tinggi dan efisiensi optimal.',
                'services' => [
                    ['title' => 'PLTA', 'description' => 'Pembangkit Listrik Tenaga Air skala besar', 'icon' => 'bolt'],
                    ['title' => 'PLTMH', 'description' => 'Pembangkit Listrik Tenaga Mikrohidro', 'icon' => 'light-bulb'],
                    ['title' => 'PLTP', 'description' => 'Pembangkit Listrik Tenaga Panas Bumi', 'icon' => 'fire'],
                    ['title' => 'Power House', 'description' => 'Bangunan pembangkit dan ruang turbin', 'icon' => 'building-office-2'],
                    ['title' => 'Switchyard', 'description' => 'Gardu induk dan sistem transmisi', 'icon' => 'bolt'],
                    ['title' => 'Penstock & Intake', 'description' => 'Pipa pesat dan bangunan intake', 'icon' => 'cube'],
                ],
                'process_steps' => [
                    ['step' => 1, 'title' => 'Studi Potensi', 'description' => 'Analisa potensi energi dan kelayakan ekonomi', 'icon' => 'chart-bar'],
                    ['step' => 2, 'title' => 'Desain MEP', 'description' => 'Perencanaan sistem mekanikal elektrikal', 'icon' => 'cog'],
                    ['step' => 3, 'title' => 'Konstruksi Sipil', 'description' => 'Pekerjaan bendungan, terowongan, dan power house', 'icon' => 'building-office-2'],
                    ['step' => 4, 'title' => 'Instalasi MEP', 'description' => 'Pemasangan turbin, generator, dan peralatan', 'icon' => 'wrench-screwdriver'],
                    ['step' => 5, 'title' => 'Testing', 'description' => 'Commissioning dan performance test', 'icon' => 'beaker'],
                    ['step' => 6, 'title' => 'Operasional', 'description' => 'Serah terima dan training operator', 'icon' => 'academic-cap'],
                ],
                'advantages' => [
                    ['title' => 'Expertise MEP', 'description' => 'Tim ahli mekanikal-elektrikal bersertifikat', 'icon' => 'cpu-chip'],
                    ['title' => 'Pengalaman PLTA', 'description' => 'Sudah membangun 3+ PLTA', 'icon' => 'trophy'],
                    ['title' => 'Koordinasi Vendor', 'description' => 'Pengalaman koordinasi dengan vendor turbin global', 'icon' => 'globe-asia-australia'],
                    ['title' => 'Safety Certified', 'description' => 'Sertifikat K3 untuk proyek high risk', 'icon' => 'shield-check'],
                ],
                'faq' => [
                    ['question' => 'Berapa kapasitas PLTA yang bisa dibangun?', 'answer' => 'Kami berpengalaman membangun PLTA dengan kapasitas 5 MW hingga 50 MW.'],
                    ['question' => 'Berapa lama pembangunan PLTA?', 'answer' => 'Untuk PLTA 10 MW, estimasi waktu konstruksi 3-4 tahun termasuk bendungan dan power house.'],
                    ['question' => 'Apakah termasuk procurement turbin?', 'answer' => 'Kami bisa membantu procurement turbin dan generator dari vendor terpercaya atau berdasarkan spesifikasi owner.'],
                    ['question' => 'Bagaimana dengan dampak lingkungan?', 'answer' => 'Setiap proyek dilengkapi dengan AMDAL dan program mitigasi dampak lingkungan.'],
                ],
                'is_active' => true,
                'display_order' => 5,
            ],
        ];

        foreach ($fields as $field) {
            BusinessField::create($field);
        }

        $this->command->info('Business fields seeded successfully with hero images!');
    }
}