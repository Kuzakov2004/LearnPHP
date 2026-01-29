<?php

namespace App\Services\Interfaces;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface AuthServiceInterface
{
    public function register(array $data): User;

    public function attemptLogin(string $email, string $password, bool $remember = false): bool;

    public function logout(): void;

}