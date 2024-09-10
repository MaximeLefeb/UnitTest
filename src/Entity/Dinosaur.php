<?php

namespace App\Entity;

use App\Type\HealthStatus;

class Dinosaur {
    private string $name;
    private string $genus;
    private int $length;
    private HealthStatus $health = HealthStatus::HEALTHY;

    public function __construct(
        string $name,
        string $genus = 'Unknown',
        int $length = 0,
    ) {
        $this->name = $name;
        $this->genus = $genus;
        $this->length = $length;
    }

    public function jsonSerialize(): array {
        return [
            'name' => $this->name,
            'genus' => $this->genus,
            'length' => $this->length,
        ];
    }

    public function getName(): string {
        return $this->name;
    }

    public function getGenus(): string {
        return $this->genus;
    }

    public function getLength(): int {
        return $this->length;
    }

    public function getSizeDescription(): string {
        if ($this->length >= 10) return 'Large';
        if ($this->length >= 5) return 'Medium';

        return 'Small';
    }

    public function setHealth(HealthStatus $health): void {
        $this->health = $health;
    }

    public function isAcceptingVisitors(): bool {
        return $this->health === HealthStatus::HEALTHY;
    }
}