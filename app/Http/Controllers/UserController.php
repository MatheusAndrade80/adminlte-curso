<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserProfile;
use App\Models\Role;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate as FacadesGate;

class UserController extends Controller
{
  public function index(Request $request)
  {
    $users = User::query();
    $users->when($request->keyword, function ($query, $keyword) {
      $query->where(function ($q) use ($keyword) {
        $q->where('name', 'like', '%' . $keyword . '%')
          ->orWhere('email', 'like', '%' . $keyword . '%');
      });
    });

    $users = $users->paginate();
    return view('users.index', compact('users'));
  }

  public function create()
  {
    return view('users.create');
  }

  public function store(Request $request)
  {
    $input = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required  | min:6'
    ]);

    User::create($input);

    return redirect()
      ->route('users.index')
      ->with('status', 'Usuário adicionado com sucesso!');
  }

  public function edit(User $user)
  {
    FacadesGate::authorize('edit', User::class);
    $user->load(['profile', 'interests']);
    $roles = Role::all();
    return view('users.edit', compact('user', 'roles'));
  }

  public function update(User $user, Request $request)
  {
    FacadesGate::authorize('edit', User::class);
    $input = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'exclude_if:password,null|min:6'
    ]);
    $user->fill($input);
    $user->save();

    return redirect()
      ->route('users.index')
      ->with('status', 'Usuário alterado com sucesso!');
  }

  public function updateProfile(User $user, Request $request)
  {
    FacadesGate::authorize('edit', User::class);
    $input = $request->validate([
      'type' => 'required',
      'address' => 'nullable',
    ]);

    UserProfile::updateOrCreate(
      ['user_id' => $user->id],
      [
        'type' => $input['type'],
        'address' => $input['address']
      ]
    );

    return back()
      ->with('status', 'Usuário alterado com sucesso!');
  }

  public function updateInterests(User $user, Request $request)
  {
    FacadesGate::authorize('edit', User::class);
    $input = $request->validate([
      'interests' => 'array',
      'interests.*.name' => 'required|string',
    ]);

    $user->interests()->delete();

    if (!empty($input['interests'])) {
      $user->interests()->createMany($input['interests']);
    }

    return back()
      ->with('status', 'Usuário alterado com sucesso!');
  }

  public function updateRoles(User $user, Request $request)
  {
    FacadesGate::authorize('edit', User::class);
    $input = $request->validate([
      'roles' => 'required|array',
    ]);

    $user->roles()->sync($input['roles']);

    return back()
      ->with('status', 'Usuário alterado com sucesso!');
  }

  public function destroy(User $user)
  {
    FacadesGate::authorize('destroy', User::class);
    $user->delete();
    return back()
      ->with('status', 'Usuário deletado com sucesso!');
  }
}
