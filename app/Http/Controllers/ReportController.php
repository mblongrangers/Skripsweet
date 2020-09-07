<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\PaymentChart;
use App\Payment;

class ReportController extends Controller
{
    public function report()
    {
    	$payments = Payment::todayVerification()->get();
        $chart = new PaymentChart;

        $start = now()->startOfWeek();
        $end = now()->addDay();

        $range = collect([]);
        $dataset = collect([]);

        do {
            $payment = Payment::verificationAt($start->toDateString())->get();

            $sum = 0;

            foreach ($payment as $payment) {
                foreach ($payment->cart->products as $product) {
                    $sum += ($product->pivot->price * $product->pivot->quantity);
                }
            }

            $range->push($start->toDateString());
            $dataset->push($sum);

            $start->addDay();

        } while ($start->toDateString() != $end->toDateString());

        $chart->labels($range->all());
        $chart->dataset('Penjualan', 'line', $dataset->all())
            ->options([
                'backgroundColor' => 'transparent',
                'borderColor' => '#38b2ac',
            ]);

    	return view('report.report', compact('payments', 'chart'));
    }

    public function pdf()
    {
    	$payments = Payment::todayVerification()->get();
    	return view('report.pdf', compact('payments'));
    }
}
