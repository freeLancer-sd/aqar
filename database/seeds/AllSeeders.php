<?php

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
        factory(\App\Models\PropertyType::class, 10)->create();
        factory(\App\Models\PropertyCategory::class, 10)->create();
        self::createUsers();
    }

    public function createUsers()
    {
        \App\User::create([
            'name' => 'Elteyab Hassan',
            'mobile' => '0114847667',
            'email' => 'Oxaltyab@mail.com',
            'password' => '$2y$10$BxoLw3meuJcWMNpdeTxZI.bbh.TMC2OEqk1PYvdlu/AAB61PhZiim',
        ]);
    }
}
