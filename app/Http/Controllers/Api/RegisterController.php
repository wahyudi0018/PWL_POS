<?php

// namespace App\Http\Controllers\Api;
// use App\Models\UserModel;
// use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;
// use Illuminate\Support\Facades\Validator;

// class RegisterController extends Controller
// {
//     public function __invoke(Request $request){
//         // set validation
//         $validator = Validator::make($request->all(), [
//             'username' => 'required',
//             'nama' => 'required',
//             'password' => 'required|min:5|confirmed',
//             'level_id' => 'required',
//         ]);

//         // validation fails
//         if ($validator->fails()){
//             return response()->json($validator->errors(), 422);
//         }

//         // create user
//         $user = UserModel::create([
//             'username' => $request->username,
//             'nama' => $request->nama,
//             'password' => bcrypt($request->password),
//             'level_id' => $request->level_id,
//         ]);

//         // return response JSON user is create
//         if($user){
//             return response()->json([
//                 'success' => true,
//                 'user' => $user,
//             ], 201);
//         }

//         // return response JSON process insert failed
//         return response()->json([
//             'success' => false,
//         ], 409);
//     }
// }


namespace App\Http\Controllers\Api;
use App\Models\UserModel;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    public function __invoke(Request $request){
        // set validation
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'nama' => 'required',
            'password' => 'required|min:5|confirmed',
            'level_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,|max:2048',
        ]);

        // validation fails
        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $image = $request->file('image');

        // create user
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => bcrypt($request->password),
            'level_id' => $request->level_id,
            'image' => $image->hashName(),
        ]);

        // return response JSON user is create
        if($user){
            return response()->json([
                'success' => true,
                'user' => $user,
            ], 201);
        }
        // return response JSON process insert failed
        return response()->json([
            'success' => false,
        ], 409);
    }
}
