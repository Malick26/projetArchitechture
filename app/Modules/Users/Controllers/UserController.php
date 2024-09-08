<?php
namespace App\Modules\Users\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Users\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function index(UserRepositoryInterface $userInterface){
        $users = $userInterface->getAllUsers();
        //dd($users);
        return view('user::index',compact('users'));
    }
    public function create(){
        return view('user::create');
    }
    public function store(Request $request, UserRepositoryInterface $userInterface){
        $data = $request->only(['first_name', 'last_name', 'telephone', 'type', 'email', 'password']);
        $data['password'] = bcrypt($data['password']); // Encrypt the password
        $userInterface->createUser($data);
        return redirect()->route('users.index');

    }



    public function edit(User $user){
        return view('user::edit',compact('user'));
    }

    public function update(Request $request,User $user,UserRepositoryInterface $userRepository){
        $validator = Validator::make($request->all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'telephone' => 'required',
            'type' => 'nullable',
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'confirm_password' => 'nullable|same:password'
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error',$validator->errors()->first())->withInput();
        }


            $data = $request->only(['first_name', 'last_name', 'telephone', 'type','email','password']);
            if (!empty(request('password'))) {
                $data['password'] = bcrypt($data['password']);
            }else{
                unset($data['password']);
            }
            $userRepository->updateUser($user->id,$data);
            return redirect()->route('users.index');
    }

    public function destroy($id, UserRepositoryInterface $userRepository){
        $userRepository->deleteUser($id, []);
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    

//function to get supplier
    public function getSuppplier(UserRepositoryInterface $userInterface)
{
    $users = $userInterface->getUsersByType('supplier');
    return view('user::supplier', compact('users'));
}



}
