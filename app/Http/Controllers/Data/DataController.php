<?php

namespace App\Http\Controllers\Data;

use App\Http\Requests\Data\DataCreateRequest;
use App\Http\Requests\Data\DataEditRequest;
use App\Repositories\Data\DataRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class UserController
 *
 * @package App\Http\Controllers\User
 */
class DataController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $data;

    /**
     * @param UserRepository $user
     */
    public function __construct(DataRepository $data)
    {
        $this->data = $data;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->data->getByPage(10, $request->input('page'), $column = ['*'], '', $request->input('search'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     *
     * @return mixed
     */
    public function store(DataCreateRequest $request)
    {
        
        return $this->data->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     *
     * @return mixed
     */
    public function show($id)
    {
        return $this->data->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UserEditRequest   $request
     * @param                   $id
     *
     * @return mixed
     */
    public function update(DataEditRequest $request, $id)
    {
        
        return $this->data->update($id, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->data->delete($id);
    }
}
