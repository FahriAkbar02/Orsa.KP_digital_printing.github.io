<?php

namespace App\Helpers;

class CustomerIdGenerator
{
    public static function generateCustomerId()
    {
        try {
            // Logika pembuatan ID pelanggan disini, misalnya kombinasi dari huruf dan angka
            $customerId = 'TAP-' . random_int(1000, 9999);
            return $customerId;
        } catch (\Exception $e) {
            // Handle the exception or generate a fallback ID
            // Log the error if necessary
            return null; // atau fallback ID jika diperlukan
        }
    }
}
