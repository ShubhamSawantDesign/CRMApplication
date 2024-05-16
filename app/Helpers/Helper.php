<?php 
namespace App\Helpers;
use Carbon\Carbon;
use DB;

class Helper {
    // Above Class Will Convert 
   public static function convertToWords($number){
       $ones = array(
           0 => '',
           1 => 'One',
           2 => 'Two',
           3 => 'Three',
           4 => 'Four',
           5 => 'Five',
           6 => 'Six',
           7 => 'Seven',
           8 => 'Eight',
           9 => 'Nine',
           10 => 'Ten',
           11 => 'Eleven',
           12 => 'Twelve',
           13 => 'Thirteen',
           14 => 'Fourteen',
           15 => 'Fifteen',
           16 => 'Sixteen',
           17 => 'Seventeen',
           18 => 'Eighteen',
           19 => 'Nineteen'
       );

       $tens = array(
           0 => '',
           1 => '',
           2 => 'Twenty',
           3 => 'Thirty',
           4 => 'Forty',
           5 => 'Fifty',
           6 => 'Sixty',
           7 => 'Seventy',
           8 => 'Eighty',
           9 => 'Ninety'
       );

       $number = number_format($number, 2, '.', '');
       $number_parts = explode('.', $number);
       $whole_number = $number_parts[0];
       $fraction = isset($number_parts[1]) ? $number_parts[1] : '';

       $words = '';

       if ($whole_number > 0) {
           $is_negative = false;
           if ($whole_number < 0) {
               $is_negative = true;
               $whole_number = abs($whole_number);
           }

           $millions = floor($whole_number / 1000000);
           $lakhs = floor(($whole_number % 1000000) / 100000);
           $thousands = floor(($whole_number % 100000) / 1000);
           $hundreds = $whole_number % 1000;

           if ($millions > 0) {
               $words .= self::convertToWords($millions) . ' Million ';
           }

           if ($lakhs > 0) {
               $words .= self::convertToWords($lakhs) . ' Lakh ';
           }

           if ($thousands > 0) {
               $words .= self::convertToWords($thousands) . ' Thousand ';
           }

           if ($hundreds > 0) {
               if ($hundreds < 20) {
                   $words .= $ones[$hundreds];
               } elseif ($hundreds < 100) {
                   $words .= $tens[substr($hundreds, 0, 1)];
                   $words .= ' ' . $ones[substr($hundreds, 1, 1)];
               } else {
                   $words .= $ones[substr($hundreds, 0, 1)];
                   $words .= ' Hundred ';
                   $words .= $tens[substr($hundreds, 1, 1)];
                   $words .= ' ' . $ones[substr($hundreds, 2, 1)];
               }
           }

           if ($is_negative) {
               $words = 'Negative ' . $words;
           }
       } else {
           $words = 'Zero';
       }

       $words = trim($words);
       return $words;
   }

   
}