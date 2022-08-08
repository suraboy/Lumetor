<?php

namespace App\Repositories\{replace};

use App\Contracts\Repository;
use App\Criterias\RequestCriteria;
use App\Interfaces\{replace}Repository;
use App\Models\{replace};

/**
 * Class {replace}RepositoryEloquent
 * @package namespace App\Repositories;
 */
class {replace}RepositoryEloquent extends Repository implements {replace}Repository
{
    /**
     * Set column for searching.
     */
    protected $fieldSearchable = [
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return {replace}::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
