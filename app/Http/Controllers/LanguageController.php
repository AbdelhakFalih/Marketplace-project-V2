<?php

namespace App\Http\Controllers;

class LanguageController
{
    // app/Http/Controllers/LanguageController.php
    public function switch(Request $request)
    {
        $locale = $request->input('locale');
        if (in_array($locale, ['fr', 'ar', 'en'])) {
            session(['locale' => $locale]);
            app()->setLocale($locale);
        }
        return response()->json(['success' => true]);
    }
}
