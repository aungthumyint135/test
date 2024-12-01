<?php

namespace App\Http\Controllers\User;

use App\Foundation\Routing\Controller;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $collection = $this->service->getStaffs($request);
            return response()->json($collection);
        }

        return view('staff.index', [
            'roles' => $this->service->getRoles()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (! Gate::check('StaffCreate')) {
            abort(403);
        }

        $roles = $this->service->getRoles();
        return view('staff.create', ['roles' => $roles,]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (! Gate::check('StaffCreate')) {
            abort(403);
        }

        $this->validate($request, [
            'name'  => 'required|min:1|max:100',
            'email' => 'required|email|' . Rule::unique('users', 'email')->whereNull('deleted_at'),
            'password' => ['required', Password::min(8)->mixedCase()],
            'role_id' => 'required|exists:roles,id',

        ]);

        $response = $this->service->createUser($request);

        if ($response) {
            return redirect()->route('users.index')->with('success', 'The staff account has been created.');
        }

        return redirect()->back()->withInput()->with('failed', 'The staff account creation was failed.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->service->getStaffByUuid($id);
        $roles = $this->service->getRoles();
        return view('staff.edit', ['staff' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (! Gate::check('StaffUpdate')) {
            abort(403);
        }

        $user = $this->service->getStaffByUuid($id);

        $this->validate($request, [
            'name'  => 'required|min:1|max:100',
            'email' => 'required|email|' . Rule::unique('users', 'email')
                    ->whereNull('deleted_at')->ignore($user->id),
            'password' => ['nullable', Password::min(8)->mixedCase()],
            'role_id' => 'required|exists:roles,id',

        ]);

        $response = $this->service->updateUser($request, $user);

        if ($response) {
            return redirect()->route('users.index')->with('success', 'The staff account has been updated.');
        }

        return redirect()->back()->withInput()->with('failed', 'The staff account update process has been failed.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (! Gate::check('StaffDelete')) {
            abort(403);
        }

        $user = $this->service->getStaffByUuid($id);

        $response = $this->service->deleteUser($user->id);

        return response()->json(['status' => $response]);
    }
}
