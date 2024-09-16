<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use DB;
use App\Models\Pesanan;

class PesananChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
       

        $totalpesanan = DB::table('pesanan')
        ->select(DB::raw('count(id) as total'))
        ->GroupBy(DB::raw("MONTH(tgltransaksi)"))
        ->pluck('total');

        $bulan = DB::table('pesanan')
        ->select(DB::raw('MONTHNAME(tgltransaksi) as bulan'))
        ->groupBy(DB::raw("MONTH(tgltransaksi)"))
        ->pluck('bulan');

        $datacount = [];

        while(count($totalpesanan) > 0) {
            $datacount[] = $totalpesanan->shift();
        }

        $databulan = [];

        while(count($bulan) > 0) {
            $databulan[] = $bulan->shift();
        }


        return $this->chart->areaChart()
    
            ->addData('Pesanan', $datacount)
          
            ->setXAxis($databulan);
    }
}
