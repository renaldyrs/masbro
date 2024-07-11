<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use DB;
class PendapatanChart
{
    protected $chart1;

    public function __construct(LarapexChart $chart1)
    {
        $this->chart1 = $chart1;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $totalpendapatan= DB::table('pesanan')
        ->select(DB::raw('sum(total) as total'))
        ->GroupBy(DB::raw("MONTH(tgltransaksi)"))
        ->pluck('total');

        $bulan = DB::table('pesanan')
        ->select(DB::raw('MONTHNAME(tgltransaksi) as bulan'))
        ->groupBy(DB::raw("MONTH(tgltransaksi)"))
        ->pluck('bulan');

        $datapendapatan = [];

        while(count($totalpendapatan) > 0) {
            $datapendapatan[] = $totalpendapatan->shift();
        }

        $databulan = [];

        while(count($bulan) > 0) {
            $databulan[] = $bulan->shift();
        }

        return $this->chart1->lineChart()
            
            ->addData('Pedapatan', $datapendapatan)
            ->setXAxis($databulan);
            
    }
}
