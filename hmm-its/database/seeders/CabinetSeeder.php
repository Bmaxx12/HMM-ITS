<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CabinetUnit;
use App\Models\CabinetMember;

class CabinetSeeder extends Seeder
{
    public function run(): void
    {
        // ─────────────────────────────────────────────
        // TIER 1: KAHIMA & BPI (Leadership Core)
        // ─────────────────────────────────────────────
        $kahima = CabinetUnit::firstOrCreate(
            ['name' => 'KAHIMA'],
            ['tier' => 'leadership_core', 'parent_unit_id' => null, 'order_number' => 1]
        );
        CabinetMember::firstOrCreate(
            ['cabinet_unit_id' => $kahima->id, 'name' => 'Wilson Angelo'],
            ['position' => 'Ketua Himpunan', 'photo' => 'organogram/Kahima.png', 'order_number' => 1]
        );

        $bpi = CabinetUnit::firstOrCreate(
            ['name' => 'BPI (Badan Pengurus Inti)'],
            ['tier' => 'leadership_core', 'parent_unit_id' => null, 'order_number' => 2]
        );
        CabinetMember::firstOrCreate(
            ['cabinet_unit_id' => $bpi->id, 'name' => 'Raka Malvin Ardeansyah'],
            ['position' => 'Wakil Ketua Himpunan', 'photo' => 'organogram/Wakahima 2.png', 'order_number' => 1]
        );
        CabinetMember::firstOrCreate(
            ['cabinet_unit_id' => $bpi->id, 'name' => 'Muhammad Hakam Mudzakkir'],
            ['position' => 'Wakil Ketua Himpunan', 'photo' => 'organogram/Wakahima 3.png', 'order_number' => 2]
        );
        CabinetMember::firstOrCreate(
            ['cabinet_unit_id' => $bpi->id, 'name' => 'Sandrilla Rahmadanty'],
            ['position' => 'Sekretaris Umum', 'photo' => 'organogram/SEKUM BENDUM 2.png', 'order_number' => 3]
        );
        CabinetMember::firstOrCreate(
            ['cabinet_unit_id' => $bpi->id, 'name' => 'Davit Jore Oktosan Purba'],
            ['position' => 'Bendahara Umum', 'photo' => 'organogram/SEKUM BENDUM 3.png', 'order_number' => 4]
        );

        // ─────────────────────────────────────────────
        // TIER 2: Divisi (Executing)
        // ─────────────────────────────────────────────
        $psdm = CabinetUnit::firstOrCreate(
            ['name' => 'PSDM (Pengembangan Sumber Daya Manusia)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 3]
        );
        CabinetMember::where('cabinet_unit_id', $psdm->id)->delete();

        // PSDM 1
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'Nur Ahnad Dzaky', 'position' => 'Kepala Departemen', 'photo' => 'organogram/PSDM/PSDM 1.png', 'order_number' => 1]);
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'Nawal Andara F.', 'position' => 'Sekretaris Departemen', 'photo' => 'organogram/PSDM/PSDM 1.png', 'order_number' => 2]);

        // PSDM 2
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'Dave Jeremiah K.', 'position' => 'Kepala Biro Kaderisasi', 'photo' => 'organogram/PSDM/PSDM 2.png', 'order_number' => 3]);
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'M. Grestan Bangun G.', 'position' => 'Kepala Biro Manajerial', 'photo' => 'organogram/PSDM/PSDM 2.png', 'order_number' => 4]);

        // PSDM 3
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'Maulana Raffy A.', 'position' => 'Staff', 'photo' => 'organogram/PSDM/PSDM 3.png', 'order_number' => 5]);
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'Aisyah Radhwanafi R.', 'position' => 'Staff', 'photo' => 'organogram/PSDM/PSDM 3.png', 'order_number' => 6]);
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'Brian Hasudungan S.', 'position' => 'Staff', 'photo' => 'organogram/PSDM/PSDM 3.png', 'order_number' => 7]);

        // PSDM 4
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'Ahmad Kholid Fauzi', 'position' => 'Staff', 'photo' => 'organogram/PSDM/PSDM 4.png', 'order_number' => 8]);
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'Jusuf Armada Y.', 'position' => 'Staff', 'photo' => 'organogram/PSDM/PSDM 4.png', 'order_number' => 9]);
        CabinetMember::create(['cabinet_unit_id' => $psdm->id, 'name' => 'Leandra Rayya S.', 'position' => 'Staff', 'photo' => 'organogram/PSDM/PSDM 4.png', 'order_number' => 10]);

        $org = CabinetUnit::firstOrCreate(
            ['name' => 'ORG (Organisasi)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 4]
        );
        CabinetMember::where('cabinet_unit_id', $org->id)->delete();

        // ORG 1
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'Achmad Nasril A.', 'position' => 'Sekretaris Departemen', 'photo' => 'organogram/ORG/ORG 1.png', 'order_number' => 1]);
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'M. Syailendra M. A.', 'position' => 'Kepala Departemen', 'photo' => 'organogram/ORG/ORG 1.png', 'order_number' => 2]);

        // ORG 2
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'Widya Kusuma Jati', 'position' => 'Kepala Biro Internal HMM', 'photo' => 'organogram/ORG/ORG 2.png', 'order_number' => 3]);
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'M. Azfar Zhafir', 'position' => 'Kepala Biro Internal KMM', 'photo' => 'organogram/ORG/ORG 2.png', 'order_number' => 4]);

        // ORG 3
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'Ivan Xavier Zlatan F', 'position' => 'Staff', 'photo' => 'organogram/ORG/ORG 3.png', 'order_number' => 5]);
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'Fikri Taqiyuddin A. P.', 'position' => 'Staff', 'photo' => 'organogram/ORG/ORG 3.png', 'order_number' => 6]);
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'Satriananda A. B.', 'position' => 'Staff', 'photo' => 'organogram/ORG/ORG 3.png', 'order_number' => 7]);

        // ORG 4
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'M. Abid Rabbani', 'position' => 'Staff', 'photo' => 'organogram/ORG/ORG 4.png', 'order_number' => 8]);
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'Marcellino Bima A.', 'position' => 'Staff', 'photo' => 'organogram/ORG/ORG 4.png', 'order_number' => 9]);
        CabinetMember::create(['cabinet_unit_id' => $org->id, 'name' => 'Aisyah R. Putri', 'position' => 'Staff', 'photo' => 'organogram/ORG/ORG 4.png', 'order_number' => 10]);

        $ppim = CabinetUnit::firstOrCreate(
            ['name' => 'PPIM (Pengembangan Profesi dan Keilmiahan Mahasiswa)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 5]
        );
        CabinetMember::where('cabinet_unit_id', $ppim->id)->delete();

        // PPIM 1
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Adil Abdillah', 'position' => 'Sekretaris Departemen', 'photo' => 'organogram/PPIM/PPIM 1.png', 'order_number' => 1]);
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Pradipta Arya P.', 'position' => 'Kepala Departemen', 'photo' => 'organogram/PPIM/PPIM 1.png', 'order_number' => 2]);

        // PPIM 2
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Rino Trawaca', 'position' => 'Kepala Biro Keprofesian', 'photo' => 'organogram/PPIM/PPIM 2.png', 'order_number' => 3]);
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Fikra Zuma Rizki', 'position' => 'Kepala Biro Pasca Kampus', 'photo' => 'organogram/PPIM/PPIM 2.png', 'order_number' => 4]);

        // PPIM 3
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Aliyyah Najwa B.', 'position' => 'Kepala Biro Keilmiahan', 'photo' => 'organogram/PPIM/PPIM 3.png', 'order_number' => 5]);
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Xabian Shaffi', 'position' => 'Kepala Biro Pengembangan Keilmiahan Mahasiswa', 'photo' => 'organogram/PPIM/PPIM 3.png', 'order_number' => 6]);

        // PPIM 4
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Alya Cinta Kirana C.', 'position' => 'Staff', 'photo' => 'organogram/PPIM/PPIM 4.png', 'order_number' => 7]);
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Azzriel Dwi A. B.', 'position' => 'Staff', 'photo' => 'organogram/PPIM/PPIM 4.png', 'order_number' => 8]);

        // PPIM 5
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'M. Zakin Al-Ghifari', 'position' => 'Staff', 'photo' => 'organogram/PPIM/PPIM 5.png', 'order_number' => 9]);
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Abdul Rafly R.', 'position' => 'Staff', 'photo' => 'organogram/PPIM/PPIM 5.png', 'order_number' => 10]);
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Ferial Sarah S.', 'position' => 'Staff', 'photo' => 'organogram/PPIM/PPIM 5.png', 'order_number' => 11]);

        // PPIM 6
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Fian Sheva Adlianta', 'position' => 'Staff', 'photo' => 'organogram/PPIM/PPIM 6.png', 'order_number' => 12]);
        CabinetMember::create(['cabinet_unit_id' => $ppim->id, 'name' => 'Farhan Manggala K.', 'position' => 'Staff', 'photo' => 'organogram/PPIM/PPIM 6.png', 'order_number' => 13]);

        $ppas = CabinetUnit::firstOrCreate(
            ['name' => 'PPAS (Pencerahan Publik dan Aksi Sosial)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 6]
        );
        CabinetMember::where('cabinet_unit_id', $ppas->id)->delete();

        // PPAS 1
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Isyana Ershandari', 'position' => 'Sekretaris Departemen', 'photo' => 'organogram/PPAS/PPAS 1.png', 'order_number' => 1]);
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Jesse Eisenhart M.', 'position' => 'Kepala Departemen', 'photo' => 'organogram/PPAS/PPAS 1.png', 'order_number' => 2]);

        // PPAS 2
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Felix Ryandra A.', 'position' => 'Kepala Biro Kajian Strategis', 'photo' => 'organogram/PPAS/PPAS 2.png', 'order_number' => 3]);
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Faza Aisyi H.', 'position' => 'Kepala Biro Dialektika Intelektual', 'photo' => 'organogram/PPAS/PPAS 2.png', 'order_number' => 4]);
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Martha Buyung', 'position' => 'Kepala Biro Sosial Masyarakat', 'photo' => 'organogram/PPAS/PPAS 2.png', 'order_number' => 5]);

        // PPAS 3
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'M. Zakhwan S.', 'position' => 'Staff', 'photo' => 'organogram/PPAS/PPAS 3.png', 'order_number' => 6]);
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Melvy Pilytika', 'position' => 'Staff', 'photo' => 'organogram/PPAS/PPAS 3.png', 'order_number' => 7]);
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Andhika Dwi A.', 'position' => 'Staff', 'photo' => 'organogram/PPAS/PPAS 3.png', 'order_number' => 8]);

        // PPAS 4
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Rafa Pratama', 'position' => 'Staff', 'photo' => 'organogram/PPAS/PPAS 4.png', 'order_number' => 9]);
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Nadia Chika S. P.', 'position' => 'Staff', 'photo' => 'organogram/PPAS/PPAS 4.png', 'order_number' => 10]);
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Sultan Gading R.', 'position' => 'Staff', 'photo' => 'organogram/PPAS/PPAS 4.png', 'order_number' => 11]);

        // PPAS 5
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Kemas M. Fathir A.', 'position' => 'Staff', 'photo' => 'organogram/PPAS/PPAS 5.png', 'order_number' => 12]);
        CabinetMember::create(['cabinet_unit_id' => $ppas->id, 'name' => 'Rafasya Fathir A.', 'position' => 'Staff', 'photo' => 'organogram/PPAS/PPAS 5.png', 'order_number' => 13]);

        $kesma = CabinetUnit::firstOrCreate(
            ['name' => 'KESMA (Kesejahteraan Mahasiswa)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 7]
        );
        CabinetMember::where('cabinet_unit_id', $kesma->id)->delete();

        // Kesma 1
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Nayla Azalia R. P.', 'position' => 'Sekretaris Departemen', 'photo' => 'organogram/Kesma/Kesma 1.png', 'order_number' => 1]);
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Javier Joyowardoyo', 'position' => 'Kepala Departemen', 'photo' => 'organogram/Kesma/Kesma 1.png', 'order_number' => 2]);

        // Kesma 2
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Rafael Sinar Baskoro', 'position' => 'Kepala Biro Keharmonisan', 'photo' => 'organogram/Kesma/Kesma 2.png', 'order_number' => 3]);
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Sobrian Affan Muzaki', 'position' => 'Kepala Biro Finansial', 'photo' => 'organogram/Kesma/Kesma 2.png', 'order_number' => 4]);

        // Kesma 3
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Eini Ellasya Putri', 'position' => 'Kepala Biro Akademik', 'photo' => 'organogram/Kesma/Kesma 3.png', 'order_number' => 5]);

        // Kesma 4
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Hanif Dwiky K.', 'position' => 'Staff', 'photo' => 'organogram/Kesma/Kesma 4.png', 'order_number' => 6]);
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Iqbal Setya N.', 'position' => 'Staff', 'photo' => 'organogram/Kesma/Kesma 4.png', 'order_number' => 7]);
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Putri Noor Azizah', 'position' => 'Staff', 'photo' => 'organogram/Kesma/Kesma 4.png', 'order_number' => 8]);

        // Kesma 5
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'M. Farrel Putra Margianto', 'position' => 'Staff', 'photo' => 'organogram/Kesma/Kesma 5.png', 'order_number' => 9]);
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Farras Rizq Pondavi', 'position' => 'Staff', 'photo' => 'organogram/Kesma/Kesma 5.png', 'order_number' => 10]);

        // Kesma 6
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Raifan Pratama', 'position' => 'Staff', 'photo' => 'organogram/Kesma/Kesma 6.png', 'order_number' => 11]);
        CabinetMember::create(['cabinet_unit_id' => $kesma->id, 'name' => 'Ancha Juvero', 'position' => 'Staff', 'photo' => 'organogram/Kesma/Kesma 6.png', 'order_number' => 12]);

        $kwu = CabinetUnit::firstOrCreate(
            ['name' => 'KWU (Kewirausahaan)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 8]
        );
        CabinetMember::where('cabinet_unit_id', $kwu->id)->delete();

        // KWU 1
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Falma Dinda Yudianto', 'position' => 'Sekretaris Departemen', 'photo' => 'organogram/KWU/KWU 1.png', 'order_number' => 1]);
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Razka Khairan Putra', 'position' => 'Kepala Departemen', 'photo' => 'organogram/KWU/KWU 1.png', 'order_number' => 2]);

        // KWU 2
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Kepala Biro Branding', 'position' => 'Kepala Biro Branding', 'photo' => 'organogram/KWU/KWU 2.png', 'order_number' => 3]);
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Faisal Zuhdi Ramadhan', 'position' => 'Kepala Biro Bussines Operations', 'photo' => 'organogram/KWU/KWU 2.png', 'order_number' => 4]);

        // KWU 3
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Indra Hussain Najib', 'position' => 'Kepala Biro Advance Development', 'photo' => 'organogram/KWU/KWU 3.png', 'order_number' => 5]);
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Aqsha Deralvito', 'position' => 'Kepala Biro Basic Development', 'photo' => 'organogram/KWU/KWU 3.png', 'order_number' => 6]);

        // KWU 4
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Hanzalah Raihan Rantisi', 'position' => 'Staff', 'photo' => 'organogram/KWU/KWU 4.png', 'order_number' => 7]);
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Syeniite Naila Aisyah', 'position' => 'Staff', 'photo' => 'organogram/KWU/KWU 4.png', 'order_number' => 8]);

        // KWU 5
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'M. Ali Hanafia', 'position' => 'Staff', 'photo' => 'organogram/KWU/KWU 5.png', 'order_number' => 9]);
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Taffy', 'position' => 'Staff', 'photo' => 'organogram/KWU/KWU 5.png', 'order_number' => 10]);
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'M. Irfan Syamil', 'position' => 'Staff', 'photo' => 'organogram/KWU/KWU 5.png', 'order_number' => 11]);

        // KWU 6
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'FMuhammad Pasya Kamil', 'position' => 'Staff', 'photo' => 'organogram/KWU/KWU 6.png', 'order_number' => 12]);
        CabinetMember::create(['cabinet_unit_id' => $kwu->id, 'name' => 'Danish Rafi Afnan', 'position' => 'Staff', 'photo' => 'organogram/KWU/KWU 6.png', 'order_number' => 13]);
        $hublu = CabinetUnit::firstOrCreate(
            ['name' => 'HUBLU (Hubungan Luar)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 9]
        );
        CabinetMember::where('cabinet_unit_id', $hublu->id)->delete();
        CabinetMember::create(['cabinet_unit_id' => $hublu->id, 'name' => 'Kepala Departemen', 'position' => 'Kepala Departemen', 'photo' => 'organogram/Hublu/Hublu 1.png', 'order_number' => 1]);
        CabinetMember::create(['cabinet_unit_id' => $hublu->id, 'name' => 'Staff 1', 'position' => 'Staff', 'photo' => 'organogram/Hublu/Hublu 2.png', 'order_number' => 2]);
    }
}
