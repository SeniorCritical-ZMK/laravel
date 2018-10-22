<?php

namespace App\Modules\Internal\app\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\Internal\app\Http\Requests\RoleRequest;
use App\Repositories\Interfaces\RoleRepositoryInterface;

class RoleController extends Controller
{
    private $roleRepo;

    protected $rView = 'internal::backend.role.';

    protected $lists = 'lists';

    protected $details = 'details';

    protected $name = 'Role';

    protected $route = 'internal::role.';

    protected $paginate = 20;

    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepo = $roleRepository;
    }

    public function index()
    {
        $this->authorize('show', $this->roleRepo->getModel());
        $columns = array('id', 'name', 'description', 'permissions');
        $lists = $this->roleRepo->allPaginate($columns, 'name', 'asc', $this->paginate);
        $data = [
            $this->lists => $lists,
            'name' => $this->name,
            'route' => $this->route,
            'rView' => $this->rView,
        ];
        return view($this->rView . 'index', $data);
    }

    public function create()
    {
        $this->authorize('create', $this->roleRepo->getModel());
        $data = [
            $this->details => $this->roleRepo->getModel(),
            'name' => $this->name,
            'route' => $this->route,
            'rView' => $this->rView,
        ];
        return view($this->rView . 'create', $data);
    }

    public function store(RoleRequest $request)
    {
        $this->authorize('create', $this->roleRepo->getModel());
        $this->roleRepo->create($request->all());
        return redirect()->route($this->route . 'index')
            ->with('success_message', "Successfully created {$this->name}.");
    }

    public function show($id)
    {
        return redirect()->route($this->route.'index');
    }

    public function edit($id)
    {
        $this->authorize('update', $this->roleRepo->getModel());
        $details = $this->roleRepo->findOneOrFail($id);
        $data = [
            $this->details => $details,
            'name' => $this->name,
            'route' => $this->route,
            'rView' => $this->rView,
        ];
        return view($this->rView . 'edit', $data);
    }

    public function update($id, RoleRequest $request)
    {
        $this->authorize('update', $this->roleRepo->getModel());
        $this->roleRepo->update($request->all(), $id);
        return redirect()->route($this->route . 'index')
            ->with('success_message', "Successfully updated {$this->name}.");
    }

    public function destroy($id)
    {
        $this->authorize('delete', $this->roleRepo->getModel());
        $is_delete = $this->roleRepo->delete($id);
        if($is_delete) {
            return redirect()->route($this->route . 'index')
                ->with('success_message', "Successfully deleted {$this->name}.");
        } else {
            return redirect()->route($this->route . 'index')
            ->with('danger_message', "Cannot delete {$this->name}!");
        }
    }
}