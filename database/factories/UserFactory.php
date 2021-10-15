<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Contact;
use App\Models\Media;
use App\Models\News;
use App\Models\Sponsor;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'type' => $faker->randomElement(['publisher','admin'])
    ];
});


$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement([
            'محليه و عالمية',
            'مال و اقتصاد',
            'أخبار المجتمع',
            'أخبار المحافظات',
            'تحقيقات و حوارات',
            'ثقافة و فن',
        ]),
        'image' =>  $faker->randomElement([
            '1633520584_الاقتصاد_.jpg','1633520668_المحافظات_.jpg','1633520880_الاخبار_.jpg','1633520918_قضايا_.jpg'
        ])
    ];
});


$factory->define(Sponsor::class, function (Faker $faker) {
    return [
        'link' => $faker->url,
        'image' =>  $faker->randomElement([
            '1.jpg','2.jpg','3.jpg','4.jpg'
        ])
    ];
});


$factory->define(Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'body' => $faker->text
    ];
});
