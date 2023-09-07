<?php

namespace App\Http\Controllers;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Billing;
use App\Models\Transaksi;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Contracts\View\View;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksi = Transaksi::all();
        $total= Transaksi::all()->sum('harga');
        $totalseluruh=$total;
        return view('transaksi.index',compact('transaksi','totalseluruh'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        // dd($transaksi);
        $setatus_sekarang = $transaksi->status;
        if ($setatus_sekarang == 1) {
            $transaksi->update(['status'=>2]);
        }
        $data = [
            'transaksi' => $transaksi
        ];
        // dd($data);
        $view = view('print-template', $data)->render();

        $dompdf = new Dompdf();

        $dompdf->setPaper('76mm', '60mm', 'portrait');

        $dompdf->loadHtml($view);

        $dompdf->render();
        // // $dompdf->stream('transaksi.pdf', ['Attachment' => false]);
        // // $pdf = PDF::loadView('print-template',$data);
        return $dompdf->stream('invoice pelanggan.pdf');
        // return response()->view('print-template')->header('Content-Type', 'text/html');
        // return view('print-template', compact('transaksi'));
    }

    public function cetak()
    {
        return view('transaksi.cetak');
    }

    public function cetakPDF(Request $request)
    {
        $inputBulan = $request->input('bulan');
        $inputTahun = $request->input('tahun');

        $transaksi = DB::select(DB::raw('
            SELECT pelanggans.pelanggan_id AS nama, pakets.namapaket AS paket, transaksi.harga AS harga, tanggaltempo.bulan AS bulan, tanggaltempo.tahun AS tahun
            FROM transaksi
            JOIN pelanggans ON pelanggans.pelanggan_id = transaksi.pelanggan_id
            JOIN pakets ON pakets.id = transaksi.pakets_id
            JOIN tanggaltempo ON tanggaltempo.id = transaksi.tanggaltempo_id
            WHERE tanggaltempo.bulan = :inputBulan
            AND tanggaltempo.tahun = :inputTahun
            GROUP BY nama, paket, harga, bulan, tahun
        '), ['inputBulan' => $inputBulan, 'inputTahun' => $inputTahun]);

        // $user = DB::select(DB::raw('
        //     SELECT
        // '));

        // dd($transaksi);

        if ($inputBulan == "januari"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan Januari';
        } else if($inputBulan == "februari"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan Februari';
        } else if($inputBulan == "maret"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan Maret';
        } else if($inputBulan == "april"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan April';
        } else if($inputBulan == "mei"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan Mei';
        } else if($inputBulan == "juni"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan Juni';
        } else if($inputBulan == "juli"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan Juli';
        } else if($inputBulan == "agustus"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan Agustus';
        } else if($inputBulan == "september"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan September';
        } else if($inputBulan == "oktober"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan Oktober';
        } else if($inputBulan == "november"){
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan November';
        } else{
            $bulan = 'Laporan Transaksi Pelanggan PPPOE Bulan Desember';
        }

        $data = [
            'title' => $bulan,
            'items' => $transaksi,
        ];

        $pdf = PDF::loadView('transaksi.template', $data);

        // return redirect()->route('/admin/gaji');
        return $pdf->stream('Rekap Gaji Bulanan.pdf');
        return redirect()->route('admin/gaji');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
