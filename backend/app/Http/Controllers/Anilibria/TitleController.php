<?php

namespace App\Http\Controllers\Anilibria;

use App\Http\Controllers\Controller;
use App\Services\AnilibriaService;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    protected $anilibria;

    public function __construct(AnilibriaService $anilibria)
    {
        $this->anilibria = $anilibria;
    }
    public function random()
    {
        return response()->json(
            $this->anilibria->get('title/random')
        );
    }

    public function updates()
    {
        return response()->json(
            $this->anilibria->get('title/updates')
        );
    }

    public function search(Request $request)
    {
        return response()->json(
            $this->anilibria->get('title/search', $request->all())
        );
    }
}
