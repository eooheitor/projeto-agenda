<?php

namespace Database\Factories;

use App\Models\Agenda;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgendaFactory extends Factory
{
  /**
   * Define o modelo de fábrica correspondente.
   *
   * @var string
   */
  protected $model = Agenda::class;

  /**
   * Define o estado padrão do modelo.
   *
   * @return array
   */
  public function definition()
  {
    $horasDisponiveis = [
      '18:00', '18:30', '19:00', '19:30', '20:00', '20:30',
      '21:00', '21:30', '22:00', '22:30', '23:00', '23:30'
    ];

    return [
      'nome' => $this->faker->name,
      'telefone' => $this->faker->numerify('##########'),
      'data' => $this->faker->date(),
      'hora' => $this->faker->randomElement($horasDisponiveis),
      'mesa' => $this->faker->numberBetween(1, 15),
      'nropessoas' => $this->faker->numberBetween(1, 10),
      'ocasiao' => $this->faker->sentence(5),
    ];
  }
}
