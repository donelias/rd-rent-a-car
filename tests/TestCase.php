<?php

use App\User;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';
    private $defaultUser;

    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }



    /**
     * Create a user
     */
    public function defaultUser()
    {
        //Consultar si el uausario fue creado por defecto
        if ($this->defaultUser)
        {
            return $this->defaultUser;
        }

        //crear un usuario
        return $this->defaultUser = factory(User::class)->create();
    }
}
