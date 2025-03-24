<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\City;
use App\Models\User;
use App\Models\Maker;
use App\Models\Model;
use App\Models\State;
use App\Models\CarType;
use App\Models\CarImage;
use App\Models\FuelType;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        CarType::factory()
            ->sequence(
                ['name' => 'Sedan'],
                ['name' => 'SUV'],
                ['name' => 'Truck'],
                ['name' => 'Van'],
                ['name' => 'Coupe'],
                ['name' => 'Crossover'],
                ['name' => 'Hatchback']
            )
            ->count(7)
            ->create();

        FuelType::factory()
                ->sequence(
                    ['name' => 'Gas'],
                    ['name' => 'Diesel'],
                    ['name' => 'Electric'],
                    ['name' => 'Hybrid']
                )
                ->count(4)
                ->create();

        $states = [
            'california' => ['Los Angeles', 'San Francisco', 'San Diego', 'Sacramento', 'San Jose'],
            'texas' => ['Houston', 'Dallas', 'Austin', 'San Antonio', 'Fort Worth'],
            'florida' => ['Miami', 'Orlando', 'Tampa', 'Jacksonville', 'Tallahassee'],
            'new_york' => ['New York City', 'Buffalo', 'Rochester', 'Albany', 'Syracuse'],
            'illinois' => ['Chicago', 'Aurora', 'Naperville', 'Joliet', 'Rockford'],
            'georgia' => ['Atlanta', 'Savannah', 'Augusta', 'Macon', 'Columbus'],
            'ohio' => ['Columbus', 'Cleveland', 'Cincinnati', 'Toledo', 'Akron'],
            'pennsylvania' => ['Philadelphia', 'Pittsburgh', 'Allentown', 'Erie', 'Scranton'],
            'arizona' => ['Phoenix', 'Tucson', 'Mesa', 'Chandler', 'Scottsdale'],
            'north_carolina' => ['Charlotte', 'Raleigh', 'Greensboro', 'Durham', 'Winston-Salem']
        ];

        foreach ($states as $state => $cities) {
            State::factory()
                ->state(['name' => $state])
                ->has(
                    City::factory()
                    ->count(count($cities))
                    ->sequence(...array_map(fn($city) => ['name' => $city], $cities))
                )
                ->create();
        }

        $makers = [
            'Toyota' => ['Camry', 'Corolla', 'RAV4', 'Highlander', 'Tacoma', 'Prius'],
            'BMW' => ['3 Series', '5 Series', 'X3', 'X5', 'M4', 'Z4'],
            'Mercedes-Benz' => ['C-Class', 'E-Class', 'S-Class', 'GLC', 'GLE', 'A-Class'],
            'Honda' => ['Civic', 'Accord', 'CR-V', 'Pilot', 'Fit', 'Odyssey'],
            'Ford' => ['F-150', 'Mustang', 'Explorer', 'Escape', 'Bronco', 'Edge'],
            'Chevrolet' => ['Silverado', 'Malibu', 'Equinox', 'Tahoe', 'Camaro', 'Traverse']
        ];

        foreach ($makers as $maker => $models) {
            Maker::factory()
                ->state(['name' => $maker])
                ->has(
                    Model::factory()
                    ->count(count($models))
                    ->sequence(...array_map(fn($model) => ['name' => $model], $models))
                )
                ->create();
        }

        User::factory()
            ->count(3)
            ->create();

        User::factory()
            ->count(2)
            ->has(
        Car::factory()
                    ->count(50)
                    ->has(
                        CarImage::factory()
                            ->count(5)
                            // ->sequence(fn (Sequence $sequence) => ['position' => $sequence->index % 5 + 1]),
                            ->sequence(
                                ['position' => 1],
                                ['position' => 2],
                                ['position' => 3],
                                ['position' => 4],
                                ['position' => 5],
                            ),
                            'images'
                    )
                    ->hasFeatures(),
                    'favouriteCars'
            )
            ->create();
    }
}
