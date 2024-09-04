<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\StaffResource;
use App\Traits\ResponserTraits;

class StaffController extends Controller
{
    use ResponserTraits;
    public function salary(Request $request)
    {
        $staff = Staff::with('user')->where('user_id', Auth::id())->first();

        if (!$staff) {
            return response()->json(['message' => 'Staff record not found'], 404);
        }
        return $this->responseSuccess('Success',new StaffResource($staff));
    }
}
