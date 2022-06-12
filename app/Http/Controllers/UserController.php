<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Traits\my_functions;
use Illuminate\Support\Facades\Hash;
use App\User;
// use PDF;
use Barryvdh\DomPDF\Facade\pdf;
// use Barryvdh\PDF;
// use Barryvdh\DomPDF\PDF;

class UserController extends Controller
{
    use my_functions;

    // ======  Return  View Register   =======
    public function addUser()
    {
        return view('auth.register');
    }


    // ======   Store New User =======
    public function registerUser(UserRequest $userRequest)
    {
        if (isset($userRequest)) {
            User::create([
                'full_name'           => $userRequest->full_name,
                'name'                => $userRequest->name,
                'email'               => $userRequest->email,
                'phone'               => $userRequest->phone,
                'password'            => Hash::make($userRequest->password),
                'level'               => $userRequest->user_level,
            ]);
            // $create_user = $this->storeThink(User::class,$userRequest);

            return redirect()->to('add-user')->with(['success' => 'تم الادخال بنجاج']);
        }
    }


    // ======= Show Users ======
    public function showUser()
    {
        $users = User::select('id', 'full_name', 'name', 'phone', 'level', 'created_at')->get();
        if (isset($users))
            return view('auth.show-users', compact('users'));
    }


    // ======= Search In Table User ======
    public function searchForUser($text_search)
    {
        if ($text_search) {
            $users = User::where('name', 'like', '%' . $text_search . '%')
                ->orWhere('full_name', 'like', '%' . $text_search . '%')->get();

            return response()->json([
                'status' => true,
                'users' => $users
            ]);
        }
    }
    // ======= Edit User =====
    public function editUser($user_id)
    {
        if (isset($user_id)) {
            $user = User::find($user_id);
            if ($user) {
                return view('auth.edit-user', compact('user'));
            }
        }
    }


    // ====== Update User =====
    public function updateUser(UserRequest $userRequest, $user_id)
    {
        if (isset($userRequest) && isset($user_id)) {
            if ($userRequest->password) {
                $update = $this->updateThink(User::class, $userRequest, $user_id);
                if ($update) {
                    return redirect()->to('show-users');
                }
            } else {
                $user = User::find($user_id);
                $update = $user->update([
                    'full_name'           => $userRequest->full_name,
                    'name'                => $userRequest->name,
                    'email'               => $userRequest->email,
                    'phone'               => $userRequest->phone,
                    'password'            => $user->password,
                    'level'               => $userRequest->user_level,
                ]);
                if ($update) {
                    return redirect()->to('show-users')->with(['success' => 'تم التحديث بنجاج']);
                }
            }
        }
    }

    // ====== Delete User =====
    public function deleteUser($user_id)
    {
        if (isset($user_id)) {

            $delete = $this->deleteThink(User::class, $user_id);
            if ($delete) {
                return response()->json([
                    'status' => true
                ]);
            }
        }
    }



    public function create()
    {

        $data = ['title' => 'Laravel 7 Generate PDF From View Example Tutorial'];

        $pdf = PDF::loadView('pdf', $data);


        return $pdf->download('Nicesnippets.pdf');
    }
}