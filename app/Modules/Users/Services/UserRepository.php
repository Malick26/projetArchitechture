<?php


namespace App\Modules\Users\Services;
use App\Models\User;
use App\Modules\Users\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
class UserRepository implements UserRepositoryInterface{

 public function getUserById(int $id):?Model{
    return User::find($id);
 }
    public function getAllUsers():array{
        return User::all()->toArray();

    }

    public function createUser(array $data):?Model{
        return User::create($data);

    }

    public function updateUser(int $id,array $data){
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser(int $id,array $data){
         User::where('id',$id)->delete();
    }

    public function getUsersByType(string $type): array
    {
        return User::where('type', $type)->get()->toArray();
    }

}

