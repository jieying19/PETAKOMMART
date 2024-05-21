<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\salesreports;

class salesreportsController extends Controller
{
    public function index()
    {
        $data_report = \App\Models\salesreports::all();
        return view('ManageSalesReport.ADMIN.ViewSalesReportPage',['data_report' => $data_report]);
    }

    public function create()
    {
        return view('ManageSalesReport.ADMIN.AddSalesReportPage');
    }

    public function store(Request $request)
    {
        $sale = salesreports::create([
            'week'=> $request->week,
            'monday'=> $request->monday,
            'tuesday'=> $request->tuesday,
            'wednesday'=> $request->wednesday,
            'thursday'=> $request->thursday,
            'friday'=> $request->friday,
        ]);

        return redirect(route('ManageSalesReport.ADMIN.ViewSalesReportPage'));
    }


    public function destroy(salesreports $id)
    {
        $id->delete();
        return redirect(route('ManageSalesReport.ADMIN.ViewSalesReportPage'));
    }


    public function update(Request $request, $id)
    {
        $data_report = \App\Models\salesreports::find($id);
        $data_report->update($request->all());

        return redirect('/salesReport')->with('success', 'Success Updated');
    }

    public function edit($id)
    {
        $data_report = \App\Models\salesreports::find($id);
        return view('ManageSalesReport.ADMIN.UpdateSalesReportPage', ['data_report'=>$data_report]);
    }

     // public function update($id, Request $request)
    // {
    //     dd($sale);

    // $sale = salesreports:: find($id);

    // $sale->week = $request->input('week');
    // $sale->monday = $request->input('monday');
    // $sale->tuesday = $request->input('tuesday');
    // $sale->wednesday = $request->input('wednesday');
    // $sale->thursday = $request->input('thursday');
    // $sale->friday = $request->input('friday');

    // $sale->save();

    // return redirect(route('ManageSalesReport.ADMIN.ViewSalesReportPage'));
    // }
}
