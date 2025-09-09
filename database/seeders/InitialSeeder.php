<?php

namespace Database\Seeders;

use App\Models\FeeWeek;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InitialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate(
            ['email' => 'admin@email.com'],
            ['name' => 'admin', 'password' => Hash::make('password'), 'role' => 'admin']
        );

        // nama anak : Abid, Athan, Adzra, Ahmad, Arsy, Barra, Alea, Aim, Ilham, Inara, Kala, Kalila, Keana,Wanah, Arshaka, Azka, Azmi, Azril, Fadli, Alif, Irul, Saqi, Zayn, Ehan, Rafa, Rayna, Uus, Yasmin, Mikha, Caca, Zara, Zema

        $parent1 = User::firstOrCreate(['email' => 'mamaabid@gmail.com'],       ['name' => 'Mama Abid',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent2 = User::firstOrCreate(['email' => 'mamaathan@gmail.com'],      ['name' => 'Mama Athan',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent3 = User::firstOrCreate(['email' => 'mamaadzra@gmail.com'],      ['name' => 'Mama Adzra',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent4 = User::firstOrCreate(['email' => 'mamaahmad@gmail.com'],      ['name' => 'Mama Ahmad',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent5 = User::firstOrCreate(['email' => 'mamaarsy@gmail.com'],       ['name' => 'Mama Arsy',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent6 = User::firstOrCreate(['email' => 'mamabarra@gmail.com'],      ['name' => 'Mama Barra',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent7 = User::firstOrCreate(['email' => 'mamaalea@gmail.com'],       ['name' => 'Mama Alea',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent8 = User::firstOrCreate(['email' => 'mamaaim@gmail.com'],        ['name' => 'Mama Aim',      'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent9 = User::firstOrCreate(['email' => 'mamailham@gmail.com'],      ['name' => 'Mama Ilham',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent10= User::firstOrCreate(['email' => 'mamainara@gmail.com'],      ['name' => 'Mama Inara',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent11= User::firstOrCreate(['email' => 'mamakala@gmail.com'],       ['name' => 'Mama Kala',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent12= User::firstOrCreate(['email' => 'mamakalila@gmail.com'],     ['name' => 'Mama Kalila',   'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent13= User::firstOrCreate(['email' => 'mamakeana@gmail.com'],      ['name' => 'Mama Keana',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent14= User::firstOrCreate(['email' => 'mamawanah@gmail.com'],      ['name' => 'Mama Wanah',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent15= User::firstOrCreate(['email' => 'mamaarshaka@gmail.com'],    ['name' => 'Mama Arshaka',  'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent16= User::firstOrCreate(['email' => 'mamaazka@gmail.com'],       ['name' => 'Mama Azka',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent17= User::firstOrCreate(['email' => 'mamaazmi@gmail.com'],       ['name' => 'Mama Azmi',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent18= User::firstOrCreate(['email' => 'mamaazril@gmail.com'],      ['name' => 'Mama Azril',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent19= User::firstOrCreate(['email' => 'mamafadli@gmail.com'],      ['name' => 'Mama Fadli',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent20= User::firstOrCreate(['email' => 'mamaalif@gmail.com'],        ['name' => 'Mama Alif',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent21= User::firstOrCreate(['email' => 'mamairul@gmail.com'],       ['name' => 'Mama Irul',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent22= User::firstOrCreate(['email' => 'mamasaqi@gmail.com'],       ['name' => 'Mama Saqi',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent23= User::firstOrCreate(['email' => 'mamazayn@gmail.com'],       ['name' => 'Mama Zayn',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent24= User::firstOrCreate(['email' => 'mamaehan@gmail.com'],       ['name' => 'Mama Ehan',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent25= User::firstOrCreate(['email' => 'mamaraffa@gmail.com'],      ['name' => 'Mama Rafa',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent26= User::firstOrCreate(['email' => 'mamarayna@gmail.com'],      ['name' => 'Mama Rayna',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent27= User::firstOrCreate(['email' => 'mamauus@gmail.com'],        ['name' => 'Mama Uus',      'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent28= User::firstOrCreate(['email' => 'mamayasmin@gmail.com'],     ['name' => 'Mama Yasmin',   'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent29= User::firstOrCreate(['email' => 'mamamikha@gmail.com'],      ['name' => 'Mama Mikha',    'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent30= User::firstOrCreate(['email' => 'mamacaca@gmail.com'],       ['name' => 'Mama Caca',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent31= User::firstOrCreate(['email' => 'mamazara@gmail.com'],       ['name' => 'Mama Zara',     'password' => Hash::make('1234'), 'role' => 'parent']);
        $parent32= User::firstOrCreate(['email' => 'mamazema@gmail.com'],       ['name' => 'Mama Zema',     'password' => Hash::make('1234'), 'role' => 'parent']);
        
        Student::firstOrCreate(['nama' => 'Abid',   'parent_id' => $parent2->id,  'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Athan',  'parent_id' => $parent1->id,  'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Adzra',  'parent_id' => $parent3->id,  'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Ahmad',  'parent_id' => $parent4->id,  'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Arsy',   'parent_id' => $parent5->id,  'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Barra',  'parent_id' => $parent6->id,  'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Alea',   'parent_id' => $parent7->id,  'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Aim',    'parent_id' => $parent8->id,  'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Ilham',  'parent_id' => $parent9->id,  'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Inara',  'parent_id' => $parent10->id, 'kelas' => 'B3']); 
        Student::firstOrCreate(['nama' => 'Kala',   'parent_id' => $parent11->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Kalila', 'parent_id' => $parent12->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Keana',  'parent_id' => $parent13->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Wanah',  'parent_id' => $parent14->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Arshaka','parent_id' => $parent15->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Azka',   'parent_id' => $parent16->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Azmi',   'parent_id' => $parent17->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Azril',  'parent_id' => $parent18->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Fadli',  'parent_id' => $parent19->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Alif',   'parent_id' => $parent20->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Irul',   'parent_id' => $parent21->id, 'kelas' => 'B3']); 
        Student::firstOrCreate(['nama' => 'Saqi',   'parent_id' => $parent22->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Zayn',   'parent_id' => $parent23->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Ehan',   'parent_id' => $parent24->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Rafa',   'parent_id' => $parent25->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Rayna',  'parent_id' => $parent26->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Uus',    'parent_id' => $parent27->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Yasmin', 'parent_id' => $parent28->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Mikha',  'parent_id' => $parent29->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Caca',   'parent_id' => $parent30->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Zara',   'parent_id' => $parent31->id, 'kelas' => 'B3']);
        Student::firstOrCreate(['nama' => 'Zema',   'parent_id' => $parent32->id, 'kelas' => 'B3']);
              

        $year = now()->year;
    
        for ($month=1; $month<=12; $month++) {
            $first = Carbon::create($year, $month, 1);
            $last  = $first->copy()->endOfMonth();

            $buckets = []; // week_of_month => ['start'=>Carbon, 'end'=>Carbon]
            for ($d = $first->copy(); $d->lte($last); $d->addDay()) {
                $w = $d->weekOfMonth; // 1..5
                if (!isset($buckets[$w])) $buckets[$w] = ['start'=>$d->copy(), 'end'=>$d->copy()];
                else $buckets[$w]['end'] = $d->copy();
            }
            foreach ($buckets as $w => $range) {
                FeeWeek::updateOrCreate(
                    ['year'=>$year,'month'=>$month,'week_of_month'=>$w],
                    [
                        'start_date'=>$range['start']->toDateString(),
                        'end_date'=>$range['end']->toDateString(),
                        'due_amount'=>config('komite.weekly_fee', 2000)
                    ]
                );
            }
        }

        $year = $year + 1;

        for ($month=1; $month<=12; $month++) {
            $first = Carbon::create($year, $month, 1);
            $last  = $first->copy()->endOfMonth();

            $buckets = []; // week_of_month => ['start'=>Carbon, 'end'=>Carbon]
            for ($d = $first->copy(); $d->lte($last); $d->addDay()) {
                $w = $d->weekOfMonth; // 1..5
                if (!isset($buckets[$w])) $buckets[$w] = ['start'=>$d->copy(), 'end'=>$d->copy()];
                else $buckets[$w]['end'] = $d->copy();
            }
            foreach ($buckets as $w => $range) {
                FeeWeek::updateOrCreate(
                    ['year'=>$year,'month'=>$month,'week_of_month'=>$w],
                    [
                        'start_date'=>$range['start']->toDateString(),
                        'end_date'=>$range['end']->toDateString(),
                        'due_amount'=>config('komite.weekly_fee', 2000)
                    ]
                );
            }
        }
    }
}
