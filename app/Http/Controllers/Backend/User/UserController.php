<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Repositories\UserRepository;
use App\Models\UsersModel;

class UserController extends Controller
{
    /**
     * UserRepository
     * @var $userRepository
     */
    protected $userRepository;

    /**
     * Create new construct 
     * 
     * @param UserRepository $userRepository
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }    

    /**
     * Get all user
     * 
     * @return View
     */
    public function all()
    { 
        return view('backend.users.listuser', ['users' => $this->userRepository->all()]);
    }

    /**
     * Create user
     * 
     * @return View
     */
    public function create()
    {
        return view('backend.users.adduser');
    }

    /**
     * Store user
     * 
     * @param AddUserRequest $request
     * @return Redirect
     */
    public function store(AddUserRequest $request)
    {
        $this->userRepository->create($request->all());

        return redirect()->route('user.index')->with('success', __('message.user.create', ['name' => 'thành viên']));
    }

    /**
     * Edit user
     * 
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        return view('backend.users.edituser', ['user' => $this->userRepository->find($id)]);
    }

    /**
     * Update user
     * 
     * @param Request $request
     * @param int $id
     * @return Redirect
     */
    public function update(Request $request, $id)
    {
        $user = $request->all();

        if ($request->password) {
            $user['password'] = $request->password;
        } else {
            $user = $request->except('password');
        }
        
        $this->userRepository->update($user, $id);
    
        return redirect()->route('user.index')->with('success', __('message.user.update', ['name' => 'thành viên']));
    }

    /**
     * Delete user
     * 
     * @param int $id
     * @return Redirect
     */
    public function delete($id)
    {
        $this->userRepository->delete($id);

        return redirect()->route('user.index')->with('success', __('message.user.delete', ['name' => 'thành viên']));
    }

    public function search(Request $request)
    {
        $result = UsersModel::where('name', 'like', '%' . $request->input('search') . '%')->get();

        return json_decode($result);
    }
}
