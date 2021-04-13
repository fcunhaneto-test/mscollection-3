<?php

namespace Database\Seeders;

use App\Models\Qualifiers\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $media = [
            ['name' => 'Blu-Ray', 'slug' => 'bd'],
            ['name' => 'Dvd', 'slug' => 'dvd'],
            ['name' => 'Mega', 'slug' => 'mega'],
            ['name' => 'Dropbox', 'slug' => 'dropbox'],
            ['name' => 'Google Play', 'slug' => 'google-play'],
            ['name' => 'Microsoft Movies', 'slug' => 'ms-movies'],
            ['name' => 'Netflix', 'slug' => 'netflix', 'stream' => true],
            ['name' => 'Prime Vídeo', 'slug' => 'prime-video', 'stream' => true],
            ['name' => 'Globo Play', 'slug' => 'globo-play', 'stream' => true],
            ['name' => 'Disney', 'slug' => 'disney', 'stream' => true],
            ['name' => 'Directv Go', 'slug' => 'directv', 'stream' => true],
            ['name' => 'Oldflix', 'slug' => 'oldflix', 'stream' => true],
        ];

        foreach ($media as $arr) {
            Media::create($arr);
        }
    }
}
