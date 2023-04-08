<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
            'created_at' => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        ]);

        $arsip = [
            'Bupati',
            'Sekretariat Daerah',
            'Sekertariat DPRD',
            'Inspektorat',
            'Dinas Pendidikan Dan Kebudayaan',
            'Dinas Kepemudaan Dan Oleh Rage',
            'Dinas Pariwisata',
            'Dinas Kesehatan',
            'Dinas Sosial, Pemberdayaan Perempuan Dan Perlindongan Anak',
            'Dinas Kependudukan Dan Pencatatan Sipil',
            'Satuan Polisi Pamong Praja',
            'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu',
            'Dinas Perdagangan, Koperasi, Udaha Kecil, dan Menengah',
            'Dinas Tenaga Kerja dan Perindustrian',
            'Dinas Komunikasi dan Informatika',
            'Dinas Pekerjaan Umum dan Penataan Ruang',
            'Dinas Perumahan dan Kawasan Pemukiman',
            'Dinas Perhubungan',
            'Dinas Lingkungan Hidup',
            'Dinas Pertanian dan Pangan',
            'Dinas Kelautan dan Perikanan',
            'Dinas Perpustakaan dan Kearsipan',
            'Badan Kepegawaian , Pendidikan, dan Pelatihan',
            'Badan  Perencanaan  Pembangunan,  Penelitian , dan Pengembangan Daerah Pengembangan',
            'Badan  Pengelolaan  Keuangan,  Pendapatan  dan  Aset Daerah',
            'Kecamatan Bonang',
            'Kecamatan Demak',
            'Kecamatan Dempet',
            'Kecamatan Gajah',
            'Kecamatan Guntur',
            'Kecamatan Karangayar',
            'Kecamatan Karangawen',
            'Kecamatan Karangtengah',
            'Kecamatan Kebonagung',
            'Kecamatan Mijen',
            'Kecamatan Mranggen',
            'Kecamatan Sayung',
            'Kecamatan Wedung',
            'Kecamatan Wonosalam',
            'Kapolres',
            'Lainnya',
            'Desa Babalan',
            'Desa Babat',
            'Desa Bakalrejo',
            'Desa Bakung',
            'Desa Balerejo',
            'Desa Baleromo',
            'Desa Bandungrejo',
            'Desa Bango',
            'Desa Banjarejo',
            'Desa Banjarsari',
            'Desa Bantengmati',
            'Desa Banyumeneng',
            'Desa Batu',
            'Desa Batursari',
            'Desa Bedono',
            'Desa Berahan Kulon',
            'Desa Berahan Wetan',
            'Desa Bermi',
            'Desa Betahwalang',
            'Desa Bogosari',
            'Desa Bolo',
            'Desa Bonangrejo',
            'Desa Botorejo',
            'Desa Botosengon',
            'Desa Boyolali',
            'Desa Brakas',
            'Desa Brambang',
            'Desa Brumbung',
            'Desa Buko',
            'Desa Bulusari',
            'Desa Bumiharjo',
            'Desa Bumirejo',
            'Desa Bunderan',
            'Desa Bungo',
            'Desa Cabean', 
            'Desa Candisari',
            'Desa Cangkring',
            'Desa Dempet',
            'Desa Dombo',
            'Desa Donorejo',
            'Desa Doreng',
            'Desa Dukun',
            'Desa Gajah',
            'Desa Gaji',
            'Desa Gebang',
            'Desa Gebangarum',
            'Desa Gedangalas',
            'Desa Gempoldenok',
            'Desa Gempolsongo',
            'Desa Gemulak',
            'Desa Geneng',
            'Desa Getas',
            'Desa Grogol',
            'Desa Guntur',
            'Desa Harjowinangun',
            'Desa Jali',
            'Desa Jamus',
            'Desa Jatimulyo',
            'Desa Jatirejo',
            'Desa Jatirogo',
            'Desa Jatisono',
            'Desa Jerukgulung',
            'Desa Jetak',
            'Desa Jetaksari',
            'Desa Jleper',
            'Desa Jogoloyo',
            'Desa Jragung',
            'Desa Jungpasir',
            'Desa Jungsemi',
            'Desa Kalianyar',
            'Desa Kalikondang',
            'Desa Kalisari',
            'Desa Kalitengah',
            'Desa Kangkung',
            'Desa Karanganyar',
            'Desa Karangasem',
            'Desa Karangawen',
            'Desa Karangmlati',
            'Desa Karangrejo',
            'Desa Karangrowo',
            'Desa Karangsari',
            'Desa Karangsono',
            'Desa Katonsari',
            'Desa Kebonagung',
            'Desa Kebonbatur',
            'Desa Kebonsari',
            'Desa Kedondong',
            'Desa Kedungkarang',
            'Desa Kedungmutih',
            'Desa Kedungori',
            'Desa Kedunguter',
            'Desa Kedungwaru',
            'Desa Kembangan',
            'Desa Kembangarum',
            'Desa Kendalasem',
            'Desa Kendaldoyong',
            'Desa Kenduren',
            'Desa Kerangkulon',
            'Desa Ketanjung',
            'Desa Klampok Lor',
            'Desa Klitih',
            'Desa Kotakan',
            'Desa Krajanbogo',
            'Desa Kramat',
            'Desa Krandon',
            'Desa Kuncir',
            'Desa Kunir',
            'Desa Kuripan',
            'Desa Kuwu',
            'Desa Loireng',
            'Desa Mandung',
            'Desa Mangunan',
            'Desa Mangunrejo',
            'Desa Margohayu',
            'Desa Margolinduk',
            'Desa Medini',
            'Desa Megonten',
            'Desa Menur',
            'Desa Merak',
            'Desa Mijen',
            'Desa Mlatiharjo',
            'Desa Mlekang',
            'Desa Mojosimo',
            'Desa Morodemak',
            'Desa Mranak',
            'Desa Mranggen',
            'Desa Mrisen',
            'Desa Mulyorejo',
            'Desa Mutih Kulon',
            'Desa Mutih Wetan',
            'Desa Ngaluran',
            'Desa Ngawen',
            'Desa Ngegot',
            'Desa Ngelokulon',
            'Desa Ngelowetan',
            'Desa Ngemplak',
            'Desa Ngemplik Wetan',
            'Desa Pamongan',
            'Desa Pasir',
            'Desa Pecuk',
            'Desa Pidodo',
            'Desa Pilangrejo',
            'Desa Pilangsari',
            'Desa Pilangwetan',
            'Desa Ploso',
            'Desa Poncoharjo',
            'Desa Prampelan',
            'Desa Prigi',
            'Desa Pulosari',
            'Desa Pundenarum',
            'Desa Purworejo',
            'Desa Purwosari',
            'Desa Raji',
            'Desa Rejosari',
            'Desa Ruwit',
            'Desa Sambiroto',
            'Desa Sambung',
            'Desa Sampang',
            'Desa Sari',
            'Desa Sarimulyo',
            'Desa Sarirejo',
            'Desa Sayung',
            'Desa Sedo',
            'Desa Serangan',
            'Desa Sidogemah',
            'Desa Sidoharjo',
            'Desa Sidokumpul',
            'Desa Sidomulyo',
            'Desa Sidorejo',
            'Desa Sokokidul',
            'Desa Solowire',
            'Desa Sriwulan',
            'Desa Sukodono',
            'Desa Sukorejo',
            'Desa Sumberejo',
            'Desa Surodadi',
            'Desa Tamansari',
            'Desa Tambakbulusan',
            'Desa Tambakroto',
            'Desa Tambirejo',
            'Desa Tanggul',
            'Desa Tangkis',
            'Desa Tanjunganyar',
            'Desa Tedunan',
            'Desa Tegalarum',
            'Desa Teluk',
        ];
        $jumlahArsip = count($arsip);
        for($x=0;$x<$jumlahArsip;$x++)
            {
                DB::table('arsip_dari')->insert([
                    'nama' => $arsip[$x],
                    'created_at' => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);
            }
    }
}
