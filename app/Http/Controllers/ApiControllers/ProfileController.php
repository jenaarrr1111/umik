<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function setData(Request $request, $id)
    {
        $user = Profile::find($id);

        if ($user === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'User not found.'
            ], 404);
        }

        if ($request->has('nama')) {
            $user->nama = $request->nama;
        }

        if ($request->has('no_tlp')) {
            $user->no_tlp = $request->no_tlp;
        }

        $user->save();

        return response()->json([
            'success' => 'true',
            'message' => 'Berhasil update data',
            'data' => $user
        ]);
    }

    public function getData($id)
    {
        $user = Profile::find($id);

        if ($user === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'User not found.'
            ], 404);
        }

        return response()->json(['data' => $user], 200);
    }

    public function delete($id)
    {
        $user = Profile::find($id);
        if ($user === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'User not found.'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => 'true',
            'data' => 'User berhasil dihapus'
        ]);
    }
}
