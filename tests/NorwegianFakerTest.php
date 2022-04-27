<?php

namespace Tests\Feature;

use Faker\Generator;
use Orchestra\Testbench\TestCase;

class NorwegianFakerTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Prikkprikkprikk\NorwegianFaker\NorwegianFakerServiceProvider::class,
        ];
    }

    /** @test */
    public function it_provides_a_text_faker()
    {
        $faker = resolve(Generator::class);

        $providers = $faker->getProviders();

        $found = false;
        foreach ($providers as $provider) {
            if(get_class($provider) === \Prikkprikkprikk\NorwegianFaker\Faker\Provider\nb_NO\Text::class) {
                $found = true;
            }
        }

        $this->assertTrue($found);
    }

    /** @test */
    public function it_provides_a_company_faker()
    {
        $faker = resolve(Generator::class);

        $providers = $faker->getProviders();

        $found = false;
        foreach ($providers as $provider) {
            if(get_class($provider) === \Prikkprikkprikk\NorwegianFaker\Faker\Provider\nb_NO\Company::class) {
                $found = true;
            }
        }

        $this->assertTrue($found);
    }

    /** @test */
    public function it_can_make_a_company_name()
    {
        $faker = resolve(Generator::class);

        $this->assertIsString($faker->company());
    }

}