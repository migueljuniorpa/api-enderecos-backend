<?php

namespace App\Repositories\Interfaces;

use App\Models\Addresses;
use Illuminate\Database\Eloquent\Collection;

interface AddressesRepositoryInterface
{
    public function find(int $id): Addresses;

    public function findAll(): Collection;

    public function create(array $data): Addresses;

    public function update(array $data, int $id): Addresses;

    public function destroy(int $id): bool;

    public function restore(int $id): Addresses;

    public function findAddressByZipcode(int $zipcode): ?Addresses;

    public function fuzzySearch(string $string): Collection;
}
