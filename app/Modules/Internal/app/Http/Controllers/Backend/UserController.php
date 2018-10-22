<?php

namespace App\Modules\Internal\app\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Modules\Internal\app\Http\Requests\UserRequest;
use App\Repositories\Interfaces\RoleRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;

class UserController extends Controller
{
    private $model;

    private $roleRepo;

    private $userRepo;

    protected $rView = 'internal::backend.user.';

    protected $lists = 'lists';

    protected $details = 'details';

    protected $name = 'User';

    protected $route = 'internal::user.';

    protected $paginate = 20;

    public function __construct(User $model, RoleRepositoryInterface $roleRepository, UserRepositoryInterface $userRepository)
    {
        $this->model = $model;
        $this->roleRepo = $roleRepository;
        $this->userRepo = $userRepository;
    }

    public function index()
    {
        $this->authorize('show', $this->userRepo->getModel());
        $value = $this->userRepo->getModel()
            ->with('role')->withoutSuperadmin()
            ->withoutExternal()
            ->paginate($this->paginate);
        $data = [
            'name' => $this->name,
            $this->lists => $value,
            'route' => $this->route,
            'rView' => $this->rView,
        ];
        return view($this->rView . 'index', $data);
    }

    public function create()
    {
        $this->authorize('create', $this->userRepo->getModel());
        $data = [
            'name' => $this->name,
            'route' => $this->route,
            $this->details => $this->model,
            'roles' => $this->roleRepo->pluck('id', 'name'),
            'rView' => $this->rView,
        ];
        return view($this->rView . 'create', $data);
    }

    public function store(UserRequest $request)
    {
        $this->authorize('create', $this->userRepo->getModel());
        $this->userRepo->create(
            array_merge($request->except('password'),
                [
                    'password' => bcrypt($request->password), 
                    'type' => 'internal'
                ]
            ));
        return redirect()->route($this->route . 'index')
            ->with('success_message', "Successfully created {$this->name}.");
    }

    public function show($id)
    {
        return redirect()->route($this->route . 'index');
    }

    public function edit($id)
    {
        $this->authorize('update', $this->userRepo->getModel());
        $user = $this->userRepo->findOneOrFail($id);
        $data = [
            'name' => $this->name,
            'route' => $this->route,
            $this->details => $user,
            'roles' => $this->roleRepo->pluck('id', 'name'),
            'rView' => $this->rView,
        ];
        return view($this->rView . 'edit', $data);
    }

    public function update(UserRequest $request, $id)
    {
        $this->authorize('update', $this->userRepo->getModel());
        $user = $this->userRepo->getModel()
            ->withoutSuperadmin()
            ->withoutExternal()
            ->findOrFail($id);
        $role = $this->roleRepo->findOneOrFail($request->role_id);
        $user->update(['name' => $request->name, 'email' => $request->email]);
        $user->role()->associate($role)->save();
        return redirect()->route($this->route . 'index')
            ->with('success_message', "Successfully updated {$this->name}.");
    }

    public function destroy($id)
    {
        $this->authorize('delete', $this->userRepo->getModel());
        $user = $this->userRepo->getModel()
            ->withoutSuperadmin()
            ->withoutExternal()
            ->findOrFail($id);
        $user->delete();
        return redirect()->route($this->route . 'index')
            ->with('success_message', "Successfully deleted {$this->name}.");
    }
}