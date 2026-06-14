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
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $psdm->id, 'name' => 'Candra Wijaya', 'position' => 'Kepala Departemen', 'order_number' => 1]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $psdm->id, 'name' => 'Sinta Nur', 'position' => 'Staff', 'order_number' => 2]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $psdm->id, 'name' => 'Fikri Aditya', 'position' => 'Staff', 'order_number' => 3]);

        $org = CabinetUnit::firstOrCreate(
            ['name' => 'ORG (Organisasi)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 4]
        );
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $org->id, 'name' => 'Dimas Andrean', 'position' => 'Kepala Departemen', 'order_number' => 1]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $org->id, 'name' => 'Lestari Ayu', 'position' => 'Staff', 'order_number' => 2]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $org->id, 'name' => 'Bagas Kuncoro', 'position' => 'Staff', 'order_number' => 3]);

        $ppim = CabinetUnit::firstOrCreate(
            ['name' => 'PPIM (Pengembangan Profesi dan Keilmiahan Mahasiswa)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 5]
        );
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $ppim->id, 'name' => 'Gilang Wirawan', 'position' => 'Kepala Departemen', 'order_number' => 1]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $ppim->id, 'name' => 'Tiara Putri', 'position' => 'Staff', 'order_number' => 2]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $ppim->id, 'name' => 'Rizky Alamsyah', 'position' => 'Staff', 'order_number' => 3]);

        $ppas = CabinetUnit::firstOrCreate(
            ['name' => 'PPAS (Pencerahan Publik dan Aksi Sosial)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 6]
        );
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $ppas->id, 'name' => 'Eko Maulana', 'position' => 'Kepala Departemen', 'order_number' => 1]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $ppas->id, 'name' => 'Anisa Rahma', 'position' => 'Staff', 'order_number' => 2]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $ppas->id, 'name' => 'Wahyu Hidayat', 'position' => 'Staff', 'order_number' => 3]);

        $kesma = CabinetUnit::firstOrCreate(
            ['name' => 'KESMA (Kesejahteraan Mahasiswa)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 7]
        );
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $kesma->id, 'name' => 'Winda Kartika', 'position' => 'Kepala Departemen', 'order_number' => 1]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $kesma->id, 'name' => 'Hendra Saputra', 'position' => 'Staff', 'order_number' => 2]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $kesma->id, 'name' => 'Sari Indah', 'position' => 'Staff', 'order_number' => 3]);

        $kwu = CabinetUnit::firstOrCreate(
            ['name' => 'KWU (Kewirausahaan)'],
            ['tier' => 'executing', 'parent_unit_id' => null, 'order_number' => 8]
        );
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $kwu->id, 'name' => 'Joko Anwar', 'position' => 'Kepala Departemen', 'order_number' => 1]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $kwu->id, 'name' => 'Mawar Melati', 'position' => 'Staff', 'order_number' => 2]);
        CabinetMember::firstOrCreate(['cabinet_unit_id' => $kwu->id, 'name' => 'Andi Setiawan', 'position' => 'Staff', 'order_number' => 3]);
    }
}
