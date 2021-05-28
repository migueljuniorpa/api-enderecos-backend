<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAddress;
use App\Http\Requests\UpdateAddress;
use App\Models\Addresses;
use App\Service\AddressesService;
use Illuminate\Http\JsonResponse;

class AddressesController extends Controller
{
    private AddressesService $addressesService;

    public function __construct(AddressesService $addressesService)
    {
        $this->addressesService = $addressesService;
    }

    /**
     * find all address in database
     *
     * @return JsonResponse
     */
    public function findAll(): JsonResponse
    {
        try {
            $data = $this->addressesService->findAll();

            return $this->success('Endereços encontrados com sucesso!', $data->toArray());
        } catch (\Throwable $throwable) {
            return $this->error('Não foi encontrar o endereço!', [], 500);
        }
    }

    /**
     * find specific address by id
     *
     * @param int $ind
     * @return JsonResponse
     */
    public function find(int $ind): JsonResponse
    {
        try {
            $data = $this->addressesService->find($ind);

            return $this->success('Endereço encontrado com sucesso!', $data->toArray());
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível salvar o endereço!', [], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateAddress $request
     * @return JsonResponse
     */
    public function store(CreateAddress $request): JsonResponse
    {
        try {
            $data = $this->addressesService->create($request->validated());

            return $this->success('Endereço salvo com sucesso!', $data->toArray());
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível salvar o endereço!', [], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAddress $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(UpdateAddress $request, int $id): JsonResponse
    {
        try {
            $data = $this->addressesService->update($request->validated(), $id);

            return $this->success('Endereço atualizado com sucesso!', $data->toArray());
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível atualizar o endereço!', [], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        try {
            if($this->addressesService->destroy($id))
                return $this->success('Endereço deletado com sucesso!', []);

        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível deletar o endereço!', [], 500);
        }
    }

    /**
     * Restore the address inactivated
     *
     * @param int $id
     * @return JsonResponse
     */
    public function restore(int $id): JsonResponse
    {
        try {
            $data = $this->addressesService->restore($id);

            return $this->success('Endereço recuperado com sucesso!', $data->toArray());
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível restaurar o endereço!', [], 500);
        }
    }

    /**
     * Find address by zipcode
     *
     * @param int $zipcode
     * @return JsonResponse
     */
    public function findAddressByZipcode(int $zipcode): JsonResponse
    {
        try {
            $data = $this->addressesService->findAddressByZipcode($zipcode);

            return $this->success('Endereços recuperados com sucesso!', $data);
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível restaurar o endereço!', [], 500);
        }
    }
}
