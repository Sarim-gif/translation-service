<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GenerateTranslations extends Command
{
    protected $signature = 'generate:translations {count=100000}';
    protected $description = 'Generate large number of translations for scalability testing';

    public function handle(): int
    {
        $count = (int) $this->argument('count');
        $batchSize = 1000;

        $this->info("Generate {$count} :");

        $keys = ['home.title','login.button','profile.name','settings.title','dashboard.title'];
        $locales = DB::table('locales')->pluck('id')->toArray();
        $tags = DB::table('tags')->pluck('id')->toArray();

        $total = 0;

        while ($total < $count) {
            $batch = [];

            for ($i = 0; $i < $batchSize && $total < $count; $i++, $total++) {
                $batch[] = [
                    'key' => $keys[array_rand($keys)].'.'.$total,
                    'locale_id' => $locales[array_rand($locales)],
                    'value' => 'Generated value '.$total,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('translations')->insert($batch);
        }

        $this->info("Successfully created {$count} translations.");
        return Command::SUCCESS;
    }
}
