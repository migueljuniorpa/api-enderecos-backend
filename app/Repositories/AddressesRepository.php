<?php

namespace App\Repositories;

use App\Models\Addresses;
use App\Repositories\Interfaces\AddressesRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AddressesRepository implements AddressesRepositoryInterface
{
    private Addresses $model;

    public function __construct(Addresses $addresses)
    {
        $this->model = $addresses;
    }

    /**
     * find specific address by id
     *
     * @param int $id
     * @return Addresses
     */
    public function find(int $id): Addresses
    {
        return $this->model->findOrFail($id);
    }

    /**
     * find all addresses from database
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * create a new addresses
     *
     * @param array $data
     * @return Addresses
     */
    public function create(array $data): Addresses
    {
        return $this->model->create($data);
    }

    /**
     * update the addresses
     *
     * @param array $data
     * @param int $id
     * @return Addresses
     */
    public function update(array $data, int $id): Addresses
    {
        $this->model->find($id)->update($data);

        return $this->model->find($id);
    }

    /**
     * find and inactive the addresses
     *
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }

    /**
     * find and restore the addresses inactivated
     *
     * @param int $id
     * @return Addresses
     */
    public function restore(int $id): Addresses
    {
        $this->model->withTrashed()->find($id)->restore();

        return $this->model->findOrFail($id);
    }

    /**
     * find address by zipcode
     *
     * @param int $zipcode
     * @return Addresses|null
     */
    public function findAddressByZipcode(int $zipcode): ?Addresses
    {
        return $this->model->select([
            'zipcode',
            'state',
            'city',
            'neighborhood',
            'street',
        ])->where('zipcode', $zipcode)->first();
    }

    /**
     * find the address by street using any single word
     *
     * @param string $string
     * @return array
     */
    public function fuzzySearch(string $string): Collection
    {
        return $this->model->where('street', 'like', "%$string%")->get();
    }
}
