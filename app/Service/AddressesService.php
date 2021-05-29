<?php

namespace App\Service;

use App\Models\Addresses;
use App\Repositories\Interfaces\AddressesRepositoryInterface;
use App\Service\Integration\ApiAddresses;
use Illuminate\Database\Eloquent\Collection;

class AddressesService
{
    private AddressesRepositoryInterface $repository;

    public function __construct(AddressesRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * find specific address by id
     *
     * @param int $id
     * @return Addresses
     */
    public function find(int $id): Addresses
    {
        return $this->repository->find($id);
    }

    /**
     * find all addresses from database
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->repository->findAll();
    }

    /**
     * create a new address
     *
     * @param array $data
     * @return Addresses
     */
    public function create(array $data): Addresses
    {
        return $this->repository->create($data);
    }

    /**
     * update the address
     *
     * @param array $data
     * @return Addresses
     */
    public function update(array $data): Addresses
    {
        return $this->repository->update($data);
    }

    /**
     * disable the address
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return $this->repository->destroy($id);
    }

    /**
     * restores the disabled address
     *
     * @param int $id
     * @return Addresses
     */
    public function restore(int $id): Addresses
    {
        return $this->repository->restore($id);
    }

    /**
     * find address by zipcode
     *
     * @param int $zipcode
     * @return array
     */
    public function findAddressByZipcode(int $zipcode): array
    {
        $data = $this->repository->findAddressByZipcode($zipcode);

        if (!$data instanceof Addresses) {
            return (new ApiAddresses())->getAddressByZipcode($zipcode);
        }

        return $data->toArray();
    }

    /**
     * find the address by street using any single word
     *
     * @param string $string
     * @return array
     */
    public function fuzzySearch(string $string): array
    {
        return $this->repository->fuzzySearch($string)->toArray();
    }
}
