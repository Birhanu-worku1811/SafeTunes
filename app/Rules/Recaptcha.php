<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $g_recaptcha_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $value,
            'remoteid' => request()->ip()
        ]);
        $recapcha_response = $g_recaptcha_response->json();
//        dd($res);
//        dd($res['score']);
//        if (!$g_recaptcha_response->json('success')) {
//            $fail("The {$attribute} is invalid.");
//        }
        if ($recapcha_response['score'] < 0.6){
            $fail("Suspicious Activity detected, please try again later!");
        }
    }
}
