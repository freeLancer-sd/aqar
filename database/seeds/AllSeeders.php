<?php

use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\User;
use Illuminate\Database\Seeder;

class AllSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PropertyType::class, 2)->create();
        factory(PropertyCategory::class, 5)->create();
        self::createUsers();
    }

    public function createUsers()
    {
        User::create([
            'name' => 'Admin Hassan',
            'mobile' => '0114847667',
            'email' => 'admin@demo.com',
            'role' => 2,
            'password' => '$2y$10$BxoLw3meuJcWMNpdeTxZI.bbh.TMC2OEqk1PYvdlu/AAB61PhZiim',
        ]);

        User::create([
            'name' => 'Elteyab Hassan',
            'mobile' => '0114847666',
            'email' => 'Oxaltyab@mail.com',
            'password' => '$2y$10$BxoLw3meuJcWMNpdeTxZI.bbh.TMC2OEqk1PYvdlu/AAB61PhZiim',
        ]);
    }
}
