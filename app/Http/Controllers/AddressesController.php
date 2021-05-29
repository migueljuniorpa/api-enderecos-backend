<?php

namespace App\Http\Controllers;

use App\Http\Requests\FindByZipcode;
use App\Http\Requests\FuzzySearch;
use App\Http\Requests\Id;
use App\Http\Requests\CreateAddress;
use App\Http\Requests\UpdateAddress;
use App\Service\AddressesService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
            return $this->error('Não foi possível encontrar o endereço!', [], 200);
        }
    }

    /**
     * find specific address by id
     *
     * @param Id $request
     * @return JsonResponse
     */
    public function find(Id $request): JsonResponse
    {
        try {
            $data = $this->addressesService->find($request->get('id'));

            return $this->success('Endereço encontrado com sucesso!', $data->toArray());
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível encontrar o endereço!', [], 200);
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
            return $this->error('Não foi possível salvar o endereço!', [], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAddress $request
     * @return JsonResponse
     */
    public function update(UpdateAddress $request): JsonResponse
    {
        try {
            $data = $this->addressesService->update($request->validated());

            return $this->success('Endereço atualizado com sucesso!', $data->toArray());
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível atualizar o endereço!', [], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Id $request
     * @return JsonResponse
     */
    public function destroy(Id $request): JsonResponse
    {
        try {
            $this->addressesService->destroy($request->get('id'));

            return $this->success('Endereço deletado com sucesso!', []);
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível deletar o endereço!', [], 200);
        }
    }

    /**
     * Restore the address inactivated
     *
     * @param Id $request
     * @return JsonResponse
     */
    public function restore(Id $request): JsonResponse
    {
        try {
            $data = $this->addressesService->restore($request->get('id'));

            return $this->success('Endereço recuperado com sucesso!', $data->toArray());
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível restaurar o endereço!', [], 200);
        }
    }

    /**
     * Find address by zipcode
     *
     * @param FindByZipcode $request
     * @return JsonResponse
     */
    public function findAddressByZipcode(FindByZipcode $request): JsonResponse
    {
        try {
            $data = $this->addressesService->findAddressByZipcode($request->get('zipcode'));

            return $this->success('Endereços recuperados com sucesso!', $data);
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível recuperar o endereço!', []);
        }
    }

    /**
     * search street
     *
     * @param FuzzySearch $request
     * @return JsonResponse
     */
    public function fuzzySearch(FuzzySearch $request): JsonResponse
    {
        try {
            $data = $this->addressesService->fuzzySearch($request->get('word'));

            return $this->success('Endereços recuperados com sucesso!', $data);
        } catch (\Throwable $throwable) {
            return $this->error('Não foi possível recuperar os endereços!', [], 200);
        }
    }
}
