<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Occurrence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OccurrencesController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $ocurrences = Occurrence::active();

        return response()->view('backend.occurrences.index', ['ocurrences' => $ocurrences]);
    }

    public function single(Occurrence $occurrence)
    {
        return response()->view('backend.occurrences.single', ['occurrence' => $occurrence]);
    }

    public function storeComment(Occurrence $occurrence, Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $user_id = \Auth::user()->id;

            $comment = $occurrence->comments()->create([
                'text'    => $validatedData['text'],
                'user_id' => $user_id,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error($e);

            return redirect()->back();
        }

        return redirect()->route('admin.occurrences.single', [$occurrence]);
    }
}