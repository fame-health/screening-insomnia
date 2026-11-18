<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateAdminUser extends Command
{
    protected $signature = 'app:make-admin-user {email?}';

    protected $description = 'Create an administrator account or grant administrator access to an existing user';

    public function handle(): int
    {
        $email = strtolower(trim((string) ($this->argument('email') ?: $this->ask('Admin email'))));

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->components->error('Enter a valid email address.');

            return self::FAILURE;
        }

        $user = User::firstOrNew(['email' => $email]);
        $name = trim((string) $this->ask('Admin name', $user->name ?: 'Administrator'));

        if ($name === '') {
            $this->components->error('The admin name cannot be empty.');

            return self::FAILURE;
        }

        $password = (string) $this->secret('Password (at least 12 characters)');
        $confirmation = (string) $this->secret('Confirm password');

        if (strlen($password) < 12) {
            $this->components->error('Use a password with at least 12 characters.');

            return self::FAILURE;
        }

        if (! hash_equals($password, $confirmation)) {
            $this->components->error('The password confirmation does not match.');

            return self::FAILURE;
        }

        $user->fill([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'is_admin' => true,
        ]);
        $user->email_verified_at = now();
        $user->save();

        $this->components->info("Administrator access is ready for {$email}.");

        return self::SUCCESS;
    }
}
