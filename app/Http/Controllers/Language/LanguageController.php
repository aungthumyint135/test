<?php

namespace App\Http\Controllers\Language;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    public function change(Request $request)
    {
        $lang = $request->lang;

        if (!in_array($lang, ['en', 'ch'])) {
            abort(400);
        }

        Session::put('locale', $lang);

        return redirect()->back();
    }
}
