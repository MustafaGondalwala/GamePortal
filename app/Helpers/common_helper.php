<?php

use App\Models\SubjectMaster;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

// function encrypt_param($parameter)
// {
//     if ($parameter == null) {
//         return null;
//     }

//     return Crypt::encryptString($parameter).config('custom.crypt_key');
// }
// function decrypt_param($parameter)
// {
//     if ($parameter == null) {
//         return null;
//     }
//     if (! Str::contains($parameter, config('custom.crypt_key'))) {
//         return $parameter;
//     }
//     try {
//         $decrypt_parameter = Crypt::decryptString(str_replace(config('custom.crypt_key'), '', $parameter));
//     } catch (DecryptException $e) {
//         exit('Invalid Parameter: ');
//     }

//     return $decrypt_parameter;
// }


function encrypt_param($parameter)
{
    if ($parameter == null) {
        return null;
    }

    return Crypt::encryptString($parameter);
}
function decrypt_param($parameter)
{
    if ($parameter == null) {
        return null;
    }
    // try {
    //     $decrypt_parameter = Crypt::decryptString($parameter);
    // } catch (DecryptException $e) {
    //     exit('Invalid Parameter: ');
    // }
    try {
        $decrypt_parameter = Crypt::decryptString($parameter);
     } catch (DecryptException $e) {
        return $parameter;
     }

    return $decrypt_parameter;
}

function dmyDateInput($dateString)
{
    return date('d-m-Y', strtotime($dateString));
}
function YmdDateInput($dateString)
{
    return date('Y-m-d', strtotime($dateString));
}
function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) {
        return $min;
    } // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int) ($log / 8) + 1; // length in bytes
    $bits = (int) $log + 1; // length in bits
    $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);

    return $min + $rnd;
}
function getToken($length = 10)
{
    $token = '';
    $codeAlphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $codeAlphabet .= 'abcdefghijklmnopqrstuvwxyz';
    $codeAlphabet .= '0123456789';
    $max = strlen($codeAlphabet); // edited

    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max - 1)];
    }

    return $token;
}
function successResponse($data)
{
    return response()->json([
        'success' => true,
        'data' => $data,
    ], 200);
}
function errorResponse($data)
{
    return response()->json([
        'success' => false,
        'data' => $data,
    ], 400);
}

function arrayToHtml($array)
{
    return '<option value="'.$array['id'].'">'.$array['name'].'</option>';
}

function collectionToOption($collections)
{
    $option_array = array_map('arrayToHtml', $collections->toArray());

    return implode('', $option_array);
}

function custom($string)
{
    return config('custom.'.$string);
}

function getAllSubjects()
{
    return cache()->remember('subjects', custom('cache_seconds'), function () {
        return SubjectMaster::where(['status' => 1])->get();
    });
}
function clean($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
function uploadFile($file, $path)
{
    $filename = rand(1, 1000000).'_'.pathinfo(clean($file->getClientOriginalName()), PATHINFO_FILENAME).'.'.$file->getClientOriginalExtension();
    $file->storeAs('public'.$path, $filename);

    return url('storage'.$path.$filename);
}
