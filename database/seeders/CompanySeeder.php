<?php

namespace Database\Seeders;
use App\Models\Eloquent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eloqunts = new Eloquent();
        $eloqunts->name = "ahmad";
        $eloqunts->email = "ahmad@a.com";
        $eloqunts->password = Hash::make('123456');
 
        $isSaved = $eloqunts->save();
    }
}
