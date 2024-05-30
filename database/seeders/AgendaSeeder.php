<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Agenda; 
use Faker\Factory as Faker;

class AgendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $horasDisponiveis = [
            '18:00', '18:30', '19:00', '19:30', '20:00', '20:30',
            '21:00', '21:30', '22:00', '22:30', '23:00', '23:30'
        ];

        for ($i = 0; $i < 20; $i++) {
            Agenda::create([
                'nome' => $faker->name,
                'telefone' => $faker->numerify('##########'), 
                'data' => $faker->date(),
                'hora' => $faker->randomElement($horasDisponiveis),
                'mesa' => $faker->numberBetween(1, 15),
                'nropessoas' => $faker->numberBetween(1, 10),
                'ocasiao' => $faker->sentence(5),
            ]);
        }
    }
}
