<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Company;

class CreateACompanyTest extends TestCase
{

    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testAllCompanyCanBeDisplayed()
    {
        $response = $this->get('/company/all');

        $response->assertStatus(302);
    }

    public function testACompanyCanBeDisplayed() {
        $response = $this->get('company/' . random_int(1, 10));

        $response->assertStatus(302);
    }

    public function testACompanyCanBeAdded() {
        
        $response = $this->post('company/add');

        $company = Company::create([

            'name' => $this->faker->word,
            'email' => $this->faker->unique()->safeEmail,
            'logo' => $this->faker->image('storage/app/public', 1024, 1024, null, false),
            'website' => $this->faker->url

        ]);

        $response->assertStatus(302);
        
    }

    // public function testACompanyCanBeUpdated() {

    //     $company = Company::first();

    //     $this->post('{{ route(\'company.update\', $company->id) }}', [

    //         'name' => $company->name,
    //         'email' => $company->email,
    //         'logo' => $company->logo,
    //         'website' => $company->website

    //     ]);

    //     $response = $this->patch('{{ route(\'company.update\', $company->id) }}', [
    //         'name' => 'Ali',
    //         'email' => 'lol@yahoo.com',
    //         'logo' => $this->faker->image('storage/app/public', 1024, 1024, null, false),
    //         'website' => $this->faker->url
    //     ]);

    //     $this->assertEquals('Ali', Company::first()->name);
    //     $this->assertEquals('lol@yahoo.com', Company::first()->email);
    // }
}
