<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Select2Controller extends Controller
{
    /**
     * 管理者
     */
    public function admins(Request $request): JsonResponse
    {
        $keyword = $request->input('q');

        $query = Admin::query()
            ->select([
                'id',
                DB::raw('CONCAT(id, name) AS text'),
            ])
            ->where(function (Builder $query) use ($keyword) {
                $query->where('name', 'LIKE', "%{$keyword}%");
            });

        return response()->json($query->paginate());
    }
}
