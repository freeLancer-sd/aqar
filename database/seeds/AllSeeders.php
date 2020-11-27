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
       self::createUsers();
       self::createCategory();
        // self::getFromSql();
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

    public function createCategory()
    {
        PropertyCategory::create([
            'title' => 'فيلا',
        ]);
        PropertyCategory::create([
            'title' => 'عمارة',
        ]);
        PropertyCategory::create([
            'title' => 'دور',
        ]);
        PropertyCategory::create([
            'title' => 'شقة',
        ]);
        PropertyCategory::create([
            'title' => 'غرفة',
        ]);
        PropertyCategory::create([
            'title' => 'بيت',]);
        PropertyCategory::create([
            'title' => 'مكتب',]);
        PropertyCategory::create([
            'title' => 'ارض',]);
        PropertyCategory::create([
            'title' => 'مزرعة',]);
        PropertyCategory::create([
            'title' => 'مستودع',]);
        PropertyCategory::create([
            'title' => 'استراحة',]);
        PropertyCategory::create([
            'title' => 'محل',
        ]);
    }

    public function getFromSql()
    {
        $path = base_path() . '/database/seeds/data.sql';
        $sql = file_get_contents($path);
        DB::unprepared($sql);
//        php artisan db:seed --class=SqlSeeder

    }
}
