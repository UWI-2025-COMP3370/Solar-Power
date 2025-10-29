<?php
namespace App\Policies;
use App\Models\Item;
use App\Models\User;
use Illuminate\Auth\Access\Response;
class ItemPolicy
{
 /**
 * Create a new policy instance.
*/
public function list(User $user): bool
{
return $user->role == "piDSSAdministrator" ||
$user->role == "Registered Customer";
}
public function create(User $user): bool
{
return $user->role == "piDSSAdministrator";
}
public function update(User $user, Item $item): bool
{
return $user->role == "piDSSAdministrator";
}
public function view(User $user, Item $item): bool
{
return $user->role == "piDSSAdministrator" ||
$user->role == "Registered Customer";
}
public function delete(User $user, Item $item): bool
{
return $user->role == "piDSSAdministrator";
}
public function search(User $user): bool
{
return $user->role == "piDSSAdministrator";
}
public function find(User $user): bool
{
return $user->role == "piDSSAdministrator";
}
}
