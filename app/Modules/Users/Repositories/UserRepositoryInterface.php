<?php
namespace App\Modules\Users\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Users;
interface UserRepositoryInterface{


    public function getUserById(int $id):?Model;

    public function getAllUsers():array;

    /**
     * Summary of createUser
     * @param array<string, string> $data
     * @return void
     */


    public function createUser(array $data):?Model;

    public function updateUser(int $id,array $data);

    public function deleteUser(int $id,array $data);

    public function getUsersByType(string $type): array;
}

