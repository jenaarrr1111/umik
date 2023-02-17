<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Update data user
     */
    public function setData(Request $request, int $id): JsonResponse
    {
        $user = Profile::find($id);

        if ($user === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'User tidak ditemukan.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|max:30',
            'no_tlp' => 'sometimes|required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => 'false',
                'message' => $validator->errors(),
            ], 409);
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
            'message' => 'Data berhasil disimpan.',
            'data' => $user,
        ], 200);
    }

    /**
     * Ambil user dengan id = `$id`
     */
    public function getData(int $id): JsonResponse
    {
        $user = Profile::find($id);

        if ($user === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        return response()->json(['success' => 'true', 'data' => $user], 200);
    }

    public function delete(int $id): JsonResponse
    {
        $user = Profile::find($id);
        if ($user === null) {
            return response()->json([
                'success' => 'false',
                'message' => 'User tidak ditemukan.',
            ], 404);
        }

        $user->delete();

        return response()->json([
            'success' => 'true',
            'message' => 'User berhasil dihapus.',
        ], 200);
    }
}
