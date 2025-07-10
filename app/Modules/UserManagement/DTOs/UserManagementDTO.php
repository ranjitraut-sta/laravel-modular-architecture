<?php

namespace App\Modules\UserManagement\DTOs;

class UserManagementDTO
{
    public string $example;

    public function __construct(string $example)
    {
        $this->example = $example;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['example'] ?? ''
        );
    }

    public function toArray(): array
    {
        return ['example' => $this->example];
    }
}