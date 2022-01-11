<?php

namespace App\Abstracts;

use App\Contracts\ModelRepositoryContract;
use Exception;

abstract class AbstractModelService
{
     /**
     * Lista de metodos do repositoty
     *
     * @var array
     */
    protected $repositoryHooks = [
        'all',
        'find',
        'create',
        'update',
        'delete',
        'refresh'
    ];

    /**
     * Eloquent model
     *
     * @var ModelRepositoryContract
     */
    protected $repository;

    /**
     * Construtor da classe
     *
     * @param ModelRepositoryContract $repository
     */
    public function __construct(ModelRepositoryContract $repository)
    {
        $this->repository = $repository;
        $this->changeRepositoryHooks();
    }

    /**
     * Altera o valor default da lista de funções usadas do repository
     */
    protected function changeRepositoryHooks() : void {}

    /**
     * Construtor da classe
     */
    public function __call($method, $arguments)
    {
        if(in_array($method, $this->repositoryHooks))
        {
            return call_user_func_array([$this->repository, $method], $arguments);
        } else {
            throw new Exception("Call to undefined method $method()");
        }
    }
}