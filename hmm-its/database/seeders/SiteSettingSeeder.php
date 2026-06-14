<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $logoMeaning = json_encode([
            [
                'order' => 1,
                'title' => 'Mesin',
                'description' => 'Roda gigi yang saling terhubung merepresentasikan elemen teknik mesin — ketepatan, presisi, dan kerjasama sistemik antar bagian yang menggerakkan organisasi.',
            ],
            [
                'order' => 2,
                'title' => 'ITS',
                'description' => 'Warna biru khas ITS yang berpadu dengan bentuk dinamis mencerminkan identitas mahasiswa Institut Teknologi Sepuluh Nopember yang berwawasan global.',
            ],
            [
                'order' => 3,
                'title' => 'Persatuan',
                'description' => 'Elemen melingkar dalam logo menggambarkan solidaritas dan kesatuan seluruh anggota Himpunan Mahasiswa Mesin dalam satu visi bersama.',
            ],
        ]);

        $mission = json_encode([
            [
                'group' => '',
                'items' => [
                    ['order' => 1, 'title' => '', 'desc' => 'Menciptakan tata kelola organisasi yang sistematis, berlandaskan konstitusi demi terwujudnya himpunan yang profesional.'],
                    ['order' => 2, 'title' => '', 'desc' => 'Mengoptimalkan sistem pengembangan sumber daya manusia yang progresif secara dinamis'],
                    ['order' => 3, 'title' => '', 'desc' => 'Menciptakan wadah pengembangan KMM yang berkelanjutan sesuai dengan HDPSDM'],
                    ['order' => 4, 'title' => '', 'desc' => 'Mengharmonisasikan hubungan dengan seluruh elemen KMM dan mitra eksternal guna menciptakan sinergitas yang kolaboratif'],
                ],
            ],
        ]);

        $settings = [
            // --- HOME: Hero ---
            ['key' => 'hero_tagline',        'value' => 'UBER ALLES!'],
            ['key' => 'hero_subtext',        'value' => 'Himpunan Mahasiswa Mesin ITS — wadah pengembangan diri, kepemimpinan, dan karya nyata bagi mahasiswa teknik mesin terbaik Indonesia.'],

            // --- HOME: Marquee ---
            ['key' => 'founding_year',       'value' => '1965'],
            ['key' => 'member_count',        'value' => '800+'],

            // --- HOME: Tiga Pilar ---
            ['key' => 'pillar_1_title',      'value' => 'Study'],
            ['key' => 'pillar_1_desc',       'value' => 'Mendorong setiap anggota untuk unggul secara akademis dan teknis, membentuk insinyur yang kompeten dan inovatif.'],
            ['key' => 'pillar_2_title',      'value' => 'Society'],
            ['key' => 'pillar_2_desc',       'value' => 'Membangun kepedulian sosial dan kontribusi nyata bagi masyarakat melalui program pengabdian dan kolaborasi komunitas.'],
            ['key' => 'pillar_3_title',      'value' => 'Solidarity'],
            ['key' => 'pillar_3_desc',       'value' => 'Mengikat seluruh anggota dalam semangat kebersamaan dan saling mendukung demi kemajuan bersama yang berkelanjutan.'],

            // --- HOME: Heritage ---
            ['key' => 'heritage_desc',       'value' => 'Berdiri sejak 1965, HMM ITS telah melewati lebih dari lima dekade perjalanan panjang mencetak pemimpin-pemimpin teknik terbaik bangsa. Dari generasi ke generasi, semangat berkarya dan berinovasi terus membara.'],

            // --- HOME: Solidarity Forever ---
            ['key' => 'solidarity_quote',    'value' => 'UBER ALLES!'],

            // --- ABOUT: Kabinet ---
            ['key' => 'cabinet_name',        'value' => 'Garda Aksara'],
            ['key' => 'cabinet_tagline',     'value' => 'Bergerak Bersama, Berkarya Nyata'],
            ['key' => 'cabinet_description', 'value' => 'Kabinet Garda Aksara hadir dengan semangat transformasi — memadukan inovasi teknis dengan kepemimpinan berkarakter untuk membawa HMM ITS ke babak baru yang lebih gemilang.'],

            // --- ABOUT: Makna Logo ---
            ['key' => 'logo_meaning',        'value' => $logoMeaning],

            // --- ABOUT: Visi & Misi ---
            ['key' => 'vision',              'value' => 'HMM FT-IRS ITS yang berintegritas sebagai wadah eskalasi guna mewujudkan sinergi Keluarga Mahasiswa Mesin.'],
            ['key' => 'mission',             'value' => $mission],

            // --- ABOUT: Arah Gerak ---
            ['key' => 'movement_direction',  'value' => 'Kabinet Garda Aksara mengusung program inkubator karya sebagai jantung gerakannya — sebuah ekosistem terstruktur di mana setiap anggota didorong untuk menghasilkan produk, riset, atau solusi nyata yang berdampak. Program ini didukung oleh mentoring lintas angkatan, pendanaan internal, dan koneksi industri yang kuat.'],

            // --- Kontak & Sosial Media ---
            ['key' => 'contact_email',       'value' => 'hmm@its.ac.id'],
            ['key' => 'instagram_url',       'value' => 'https://www.instagram.com/hmmits/'],
            ['key' => 'youtube_url',         'value' => 'https://www.youtube.com/@hmmits'],
        ];

        foreach ($settings as $setting) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => $setting['key']],
                ['value' => $setting['value'], 'updated_at' => now(), 'created_at' => now()]
            );
        }
    }
}
