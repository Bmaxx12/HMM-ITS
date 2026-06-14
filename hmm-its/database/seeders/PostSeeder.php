<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $catBerita   = Category::where('slug', 'berita-organisasi')->first();
        $catPrestasi = Category::where('slug', 'prestasi')->first();
        $catKegiatan = Category::where('slug', 'kegiatan')->first();
        $catAkademik = Category::where('slug', 'akademik')->first();
        $catSosial   = Category::where('slug', 'sosial')->first();

        $posts = [
            [
                'title'        => 'HMM ITS Raih Juara 1 Nasional pada Kompetisi Mesin PIMNAS 2026',
                'slug'         => 'hmm-its-raih-juara-1-pimnas-2026',
                'thumbnail'    => null,
                'excerpt'      => 'Tim mahasiswa Teknik Mesin ITS berhasil memuncaki tangga juara dalam ajang bergengsi PIMNAS 2026 yang digelar di Universitas Diponegoro, membawa pulang medali emas.',
                'body'         => '<p>Sebuah pencapaian luar biasa ditorehkan oleh mahasiswa Departemen Teknik Mesin ITS dalam ajang Pekan Ilmiah Mahasiswa Nasional (PIMNAS) ke-39 yang berlangsung di Universitas Diponegoro, Semarang.</p><p>Tim yang terdiri dari tiga mahasiswa semester enam ini berhasil mempertahankan gelar juara dengan menampilkan inovasi sistem pendingin otomotif berbasis termoelektrik yang terbukti meningkatkan efisiensi bahan bakar hingga 18%.</p><p>"Ini adalah buah dari kerja keras selama satu tahun penuh. Kami berterima kasih kepada dosen pembimbing, HMM ITS, dan seluruh civitas akademika ITS yang telah mendukung perjalanan ini," ujar ketua tim, Fahmi Aldiansyah.</p><p>Dengan pencapaian ini, ITS kembali membuktikan diri sebagai kampus teknik terdepan di Indonesia yang terus melahirkan inovator-inovator muda bertalenta.</p>',
                'category_id'  => $catPrestasi?->id,
                'author_name'  => 'Redaksi HMM ITS',
                'status'       => 'published',
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title'        => 'Open Recruitment Kabinet Pionir Berkarya 2026 Resmi Dibuka',
                'slug'         => 'open-recruitment-kabinet-pionir-berkarya-2026',
                'thumbnail'    => null,
                'excerpt'      => 'Kabinet Pionir Berkarya HMM ITS membuka kesempatan bagi mahasiswa Teknik Mesin ITS untuk bergabung dan berkontribusi dalam roda organisasi periode 2026.',
                'body'         => '<p>Himpunan Mahasiswa Mesin ITS dengan bangga mengumumkan pembukaan Open Recruitment (Oprec) untuk Kabinet Pionir Berkarya periode 2026. Seluruh mahasiswa aktif Departemen Teknik Mesin ITS diundang untuk bergabung dan menjadi bagian dari perjalanan bersejarah ini.</p><h2>Divisi yang Membuka Rekrutmen</h2><ul><li>Bureau of Human Capital</li><li>Bureau of Creative Communication</li><li>Bureau of Finance & Resources</li><li>Departemen Keilmuan & Riset</li><li>Departemen Pengabdian Masyarakat</li><li>Departemen Hubungan Luar</li><li>Departemen Minat & Bakat</li></ul><h2>Persyaratan Umum</h2><p>Mahasiswa aktif semester 2–6, IPK minimal 2.75, berkomitmen penuh selama satu periode kepengurusan, dan memiliki semangat untuk berkontribusi nyata.</p><p>Pendaftaran dibuka mulai 10 Juni hingga 25 Juni 2026 melalui tautan yang tersedia di bio Instagram resmi @hmmits. Mari bersama-sama kita wujudkan visi HMM ITS yang lebih gemilang!</p>',
                'category_id'  => $catBerita?->id,
                'author_name'  => 'Sekretaris Jenderal HMM ITS',
                'status'       => 'published',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title'        => 'Workshop Solidifikasi Logam: Eksplorasi Teknologi Pengecoran Modern',
                'slug'         => 'workshop-solidifikasi-logam-2026',
                'thumbnail'    => null,
                'excerpt'      => 'Departemen Keilmuan & Riset HMM ITS menyelenggarakan workshop intensif dua hari tentang teknologi solidifikasi logam yang dihadiri lebih dari 120 peserta.',
                'body'         => '<p>Dalam rangka meningkatkan kompetensi teknis anggota, Departemen Keilmuan & Riset HMM ITS kembali menggelar acara unggulannya: Workshop Solidifikasi Logam 2026.</p><p>Workshop dua hari yang berlangsung di Laboratorium Manufaktur Teknik Mesin ITS ini menghadirkan dua narasumber utama: Dr. Ir. Bambang Hartono dari Institut Teknologi Bandung dan Bapak Rudi Santoso, praktisi industri pengecoran dari PT. Krakatau Steel.</p><h2>Materi yang Dibahas</h2><ul><li>Dasar-dasar proses pembekuan logam cair</li><li>Teknik pengecoran pasir dan die casting modern</li><li>Simulasi proses solidifikasi dengan software MAGMASOFT</li><li>Studi kasus cacat produk cor dan cara mengatasinya</li><li>Hands-on: Praktik pengecoran aluminium skala lab</li></ul><p>Antusiasme peserta yang mencapai 120 orang dari berbagai angkatan menunjukkan betapa besar minat anggota HMM ITS terhadap pengembangan kompetensi teknis yang relevan dengan kebutuhan industri.</p>',
                'category_id'  => $catAkademik?->id,
                'author_name'  => 'Dept. Keilmuan & Riset HMM ITS',
                'status'       => 'published',
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'title'        => 'HMM ITS Gelar Bakti Sosial di Desa Kedawung, Sidoarjo',
                'slug'         => 'bakti-sosial-desa-kedawung-2026',
                'thumbnail'    => null,
                'excerpt'      => 'Departemen Pengabdian Masyarakat HMM ITS menerjunkan 60 mahasiswa dalam kegiatan bakti sosial multi-program di Desa Kedawung, Sidoarjo selama akhir pekan.',
                'body'         => '<p>Sebagai wujud nyata dari pilar Society, Departemen Pengabdian Masyarakat HMM ITS sukses menyelenggarakan kegiatan Bakti Sosial di Desa Kedawung, Kecamatan Candi, Kabupaten Sidoarjo pada 24–25 Mei 2026.</p><p>Sebanyak 60 mahasiswa yang tergabung dalam tiga kelompok kerja turun langsung ke lapangan selama dua hari penuh membawa misi nyata untuk desa tersebut.</p><h2>Program Kegiatan</h2><ul><li><strong>Kelas Inspirasi:</strong> Mengajarkan sains dan matematika kepada 80 siswa SD Kedawung dengan metode eksperimen sederhana yang menyenangkan.</li><li><strong>Perbaikan Infrastruktur:</strong> Pengecatan dan perbaikan balai desa bersama warga setempat.</li><li><strong>Edukasi Kesehatan:</strong> Penyuluhan PHBS (Perilaku Hidup Bersih dan Sehat) oleh tim kolaborasi dengan mahasiswa kedokteran ITS.</li><li><strong>Bazar Murah:</strong> Penjualan sembako dengan harga subsidi untuk 200 kepala keluarga prasejahtera.</li></ul><p>"Ini bukan sekadar acara, ini adalah pengingat bahwa ilmu yang kita dapatkan di kampus memiliki tanggung jawab sosial," ungkap Koordinator Baksos, Nadia Permatasari.</p>',
                'category_id'  => $catSosial?->id,
                'author_name'  => 'Dept. Pengabdian Masyarakat HMM ITS',
                'status'       => 'published',
                'published_at' => Carbon::now()->subDays(15),
            ],
            [
                'title'        => 'Pelantikan Kabinet Pionir Berkarya: Babak Baru Pengabdian HMM ITS',
                'slug'         => 'pelantikan-kabinet-pionir-berkarya-2026',
                'thumbnail'    => null,
                'excerpt'      => 'Upacara pelantikan resmi Kabinet Pionir Berkarya HMM ITS digelar khidmat di Graha ITS, menandai dimulainya era baru kepengurusan yang penuh harapan.',
                'body'         => '<p>Dengan penuh khidmat dan semangat membara, Himpunan Mahasiswa Mesin ITS secara resmi melantik Kabinet Pionir Berkarya dalam sebuah upacara pelantikan yang berlangsung di Graha ITS pada Sabtu, 15 Maret 2026.</p><p>Acara yang dihadiri oleh lebih dari 300 tamu undangan — terdiri dari mahasiswa aktif, alumni, jajaran Dewan Pertimbangan Anggota (DPA), serta pimpinan Departemen Teknik Mesin ITS — ini berjalan dengan lancar dan penuh makna.</p><p>Ketua Umum terpilih, Aryan Baskara (Teknik Mesin 2023), dalam sambutannya menegaskan komitmen kabinet untuk memfokuskan diri pada tiga agenda utama: penguatan kompetensi teknis anggota, peningkatan kolaborasi industri, dan transformasi tata kelola organisasi yang lebih transparan dan terdigitalisasi.</p><p>"Kami tidak hanya ingin menjadi himpunan yang aktif secara kuantitas, tapi yang paling penting adalah kualitas karya nyata yang kami tinggalkan untuk generasi berikutnya," tegasnya di hadapan seluruh hadirin.</p><p>Kabinet Pionir Berkarya resmi mengemban amanah untuk periode Maret 2026 hingga Maret 2027.</p>',
                'category_id'  => $catBerita?->id,
                'author_name'  => 'Redaksi HMM ITS',
                'status'       => 'published',
                'published_at' => Carbon::now()->subDays(80),
            ],
            [
                'title'        => 'Persiapan Kompetisi Formula SAE: Tim HMM ITS Masuki Fase Desain Final',
                'slug'         => 'formula-sae-tim-hmm-its-desain-final-2026',
                'thumbnail'    => null,
                'excerpt'      => 'Tim Formula SAE ITS yang berakar dari HMM ITS telah memasuki fase desain final kendaraan balap formula untuk kompetisi internasional yang akan digelar Oktober mendatang.',
                'body'         => '<p>Setelah melewati proses seleksi ketat dan pengembangan konsep selama hampir enam bulan, Tim Formula SAE ITS kini telah memasuki fase paling krusial: finalisasi desain kendaraan balap formula untuk kompetisi Formula SAE Asia Pacific 2026.</p><p>Tim yang beranggotakan 28 mahasiswa — mayoritas dari Departemen Teknik Mesin — ini sedang berjibaku dengan detail teknis yang sangat presisi: mulai dari aerodinamika sayap, optimasi suspensi pushrod, hingga kalibrasi sistem transmisi CVT.</p><h2>Inovasi Teknis Tahun Ini</h2><ul><li>Sasis monokok berbahan carbon fiber pertama dalam sejarah tim</li><li>Sistem aerodinamika aktif yang dapat disesuaikan saat berkendara</li><li>Penggunaan simulasi CFD (Computational Fluid Dynamics) secara ekstensif</li><li>Integrasi sensor telemetri real-time berbasis IoT</li></ul><p>Kompetisi Formula SAE Asia Pacific 2026 akan berlangsung di Sirkuit Internasional Sentul, Bogor pada 15–20 Oktober 2026. Tim HMM ITS menargetkan masuk 10 besar overall dan juara kategori Design Report.</p>',
                'category_id'  => $catKegiatan?->id,
                'author_name'  => 'Tim Formula SAE ITS',
                'status'       => 'published',
                'published_at' => Carbon::now()->subDays(3),
            ],
        ];

        foreach ($posts as $postData) {
            Post::firstOrCreate(['slug' => $postData['slug']], $postData);
        }
    }
}
