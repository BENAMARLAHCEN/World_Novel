<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\Interface\IUserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{  
    protected $user;

    public function __construct(IUserRepository $user)
    {
        $this->user = $user;
    }

    public function index()
    {   
        $users = $this->user->list();

        return view('admin.user.index',compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {   
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $this->user->storeOrUpdate($id = null, $data);

        return redirect()->route('user.index')->with([
            'message' => 'User added successfully!', 
            'status' => 'success'
        ]);
    }

    public function show($id)
    {   
        $user = $this->user->findById($id);

        return view('admin.user.show',compact('user'));
    }

    public function edit($id)
    {   
        $user = $this->user->findById($id);

        return view('admin.user.edit',compact('user'));
    }

    public function update(Request $request, $id)
    {   
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $this->user->storeOrUpdate($id, $data);

        return redirect()->route('user.index')->with([
            'message' => 'User updated successfully!', 
            'status' => 'success'
        ]);
    }

    public function destroy($id)
    {   
        $this->user->destroyById($id);

        return redirect()->route('user.index')->with([
            'message' => 'User deleted successfully!', 
            'status' => 'success'
        ]);
    }
}
