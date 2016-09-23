<?php

namespace App\Repositories\Data;

use App\Contracts\Crudable;
use App\Contracts\Paginable;
use App\Contracts\Searchable;
use App\Entities\Data;
use App\Repositories\AbstractRepository;

/**
 * Class UserRepository
 *
 * @package App\Repositories\User
 */
class DataRepository extends AbstractRepository implements Crudable, Paginable, Searchable
{

    /**
     * @param User $user
     */
    public function __construct(Data $Data)
    {
        $this->model = $Data;
    }

    /**
     * @param int   $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find($id, array $columns = ['*'])
    {
        // query to sql
        return parent::find($id, $columns);
    }

    /**
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function create(array $data)
    {
        // execute sql insert
        return parent::create([
            'nama'     => e($data['nama']),
            'email'    => e($data['email']),
            'telp'    => e($data['telp']),
            'alamat'    => e($data['alamat']),
        ]);

    }

    /**
     * @param       $id
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, array $data)
    {
        
        return parent::update($id, [
           'nama'     => e($data['nama']),
            'email'    => e($data['email']),
            'telp'    => e($data['telp']),
            'alamat'    => e($data['alamat']),
        ]);
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        return parent::delete($id);
    }

    /**
     * @param int    $limit
     * @param int    $page
     * @param array  $column
     * @param string $field
     * @param string $search
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // query to aql
        return parent::getByPage($limit, $page, $column, 'nama', $search);
    }

    /**
     * @param string $query
     * @param int    $page
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function search($query, $page = 1)
    {
        // query to aql
        return parent::likeSearch('nama', $query);
    }

}