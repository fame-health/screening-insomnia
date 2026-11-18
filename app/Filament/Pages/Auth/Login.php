<?php

namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\Login as FilamentLogin;

class Login extends FilamentLogin
{
    protected string $view = 'filament.auth.login';

    protected static string $layout = 'filament.auth.layout';
}
