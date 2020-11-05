<?php

$customer_type = strtoupper(filter_input(INPUT_POST, 'type'));

$invoice_subtotal = filter_input(INPUT_POST, 'subtotal');


switch ($customer_type) {
    case 'R':
        if ($invoice_subtotal < 100) {
            $discount_percent = .0;
        } else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250) {
            $discount_percent = .1;
        } else if ($invoice_subtotal > 250 && $invoice_subtotal < 500) {
            $discount_percent = .25;
        } else if ($invoice_subtotal >= 500) {
            $discount_percent = .30;
        }
    break;
    case 'C':
        if ($invoice_subtotal >= 1 ) {
            $discount_percent = .2;
        }
    break;
    case 'T':
        if ($invoice_subtotal < 500 ) {
            $discount_percent = .4;
        } else {
            $discount_percent = .5;
        }
    break;
    default:
        if ($invoice_subtotal >= 1){
            $discount_percent = .1;
        }
    break;

}

/*
if ($customer_type == 'r') {
    if ($invoice_subtotal < 100) {
        $discount_percent = .0;
    } else if ($invoice_subtotal >= 100 && $invoice_subtotal < 250) {
        $discount_percent = .1;
    } else if ($invoice_subtotal > 250 && $invoice_subtotal < 500) {
        $discount_percent = .25;
    } else if ($invoice_subtotal >= 500) {
        $discount_percent = .30;
    }
} else if ($customer_type == 'c') {
    if ($invoice_subtotal >= 1 ) {
        $discount_percent = .2;
    } 
} else if ($customer_type == 't') {
    if ($invoice_subtotal < 500 ) {
        $discount_percent = .4;
    } else {
        $discount_percent = .5;
    }
} else if ($customer_type == 'customer_type'){
    if ($invoice_subtotal >= 1){
        $discount_percent = .1;
    }
}
*/

$discount_amount = $invoice_subtotal * $discount_percent;
$invoice_total = $invoice_subtotal - $discount_amount;

$percent = number_format(($discount_percent * 100));
$discount = number_format($discount_amount, 2);
$total = number_format($invoice_total, 2);

include 'invoice_total.php';

?>