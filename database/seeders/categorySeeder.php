<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dati = ["primi", "secondi", "contorni", "dessert"];
        // Per ogni elemento dell'array $dati voglio creare una riga nella tabella "categories"
        foreach ($dati as $cat) {
            // Anche se usiamo ::create o ->fill, siccome siamo in un seeder,
            // non è necessario compilare la proprietà $fillable del model.
            Category::create([
                "name" => $cat
            ]);
        }
    }
}
