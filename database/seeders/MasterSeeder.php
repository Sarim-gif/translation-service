<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            DB::table('locales')->insert([
                ['id'=>1,'code'=>'en','name'=>'English','created_at'=>now(),'updated_at'=>now()],
                ['id'=>2,'code'=>'fr','name'=>'French','created_at'=>now(),'updated_at'=>now()],
                ['id'=>3,'code'=>'es','name'=>'Spanish','created_at'=>now(),'updated_at'=>now()],
            ]);

            DB::table('tags')->insert([
                ['id'=>1,'name'=>'web','created_at'=>now(),'updated_at'=>now()],
                ['id'=>2,'name'=>'mobile','created_at'=>now(),'updated_at'=>now()],
                ['id'=>3,'name'=>'desktop','created_at'=>now(),'updated_at'=>now()],
            ]);

            DB::table('translations')->insert([
                [
                    'id'=>1,
                    'key'=>'home.title',
                    'locale_id'=>1,
                    'value'=>'Home',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'id'=>2,
                    'key'=>'home.title',
                    'locale_id'=>2,
                    'value'=>'Accueil',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'id'=>3,
                    'key'=>'login.button',
                    'locale_id'=>1,
                    'value'=>'Login',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'id'=>4,
                    'key'=>'login.button',
                    'locale_id'=>3,
                    'value'=>'Iniciar sesión',
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
            ]);

            DB::table('tag_translation')->insert([
                ['translation_id'=>1,'tag_id'=>1],
                ['translation_id'=>2,'tag_id'=>1],
                ['translation_id'=>3,'tag_id'=>2],
                ['translation_id'=>4,'tag_id'=>2],
            ]);

            DB::table('api_tokens')->insert([
                [
                    'token' => 'sarimkhan123',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]);

        });
    }
}
