<?php 

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function detail(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        return view('user.detail', compact('user'));
    }
}