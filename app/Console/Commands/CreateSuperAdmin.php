<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\Interfaces\UserRepositoryInterface;

class CreateSuperAdmin extends Command
{
    private $userRepo;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:super_admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To create super admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        parent::__construct();
        $this->userRepo = $userRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->ask('Enter user name ?');
        $email = $this->ask('Enter email ?');
        $password = $this->secret('Enter password ?');

        $inputs = [
            'name'      => $name,
            'email'     => $email,
            'password'  => bcrypt($password),
            'type'      => 'internal',
            'super_admin' => 1
        ];

        $this->userRepo->create($inputs);

        $this->info('Successfully created super admin');
    }
}
