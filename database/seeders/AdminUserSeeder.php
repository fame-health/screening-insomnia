<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;
use RuntimeException;

class AdminUserSeeder extends Seeder
{
    /**
     * Create or refresh the local Filament administrator account.
     */
    public function run(): void
    {
        $email = strtolower(trim((string) env('ADMIN_EMAIL', 'admin@gmail.com')));
        $name = trim((string) env('ADMIN_NAME', 'Administrator'));
        $password = (string) env('ADMIN_PASSWORD', '');

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('ADMIN_EMAIL must be a valid email address.');
        }

        if ($name === '') {
            throw new InvalidArgumentException('ADMIN_NAME cannot be empty.');
        }

        if ($password === '') {
            if (! app()->isLocal() && ! app()->environment('testing')) {
                throw new RuntimeException('Set ADMIN_PASSWORD before seeding an administrator outside local/testing.');
            }

            $password = 'Admin@12345!';
        }

        if (strlen($password) < 12) {
            throw new InvalidArgumentException('ADMIN_PASSWORD must be at least 12 characters long.');
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
                'is_admin' => true,
            ],
        );
    }
}
