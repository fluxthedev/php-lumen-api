<?php

namespace App\Http\Controllers;

use App\Events\UserCreated;
use Illuminate\Http\Request;
use App\User; // Make sure you've created this model

class UserController extends Controller
{
  public function index()
  {
    return User::all();
  }

  public function show($id)
  {
    return User::find($id);
  }

  public function store(Request $request)
  {
    $user = User::create($request->all());

    event(new UserCreated($user));

    return $user;
  }

  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);
    $user->update($request->all());

    return $user;
  }

  public function delete(Request $request, $id)
  {
    $user = User::findOrFail($id);
    $user->delete();

    return 204;
  }
}
