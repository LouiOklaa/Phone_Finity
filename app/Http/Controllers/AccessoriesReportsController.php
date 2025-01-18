<?php

namespace App\Http\Controllers;

use App\Models\Accessories;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\ExportExcel;
use Maatwebsite\Excel\Facades\Excel;

class AccessoriesReportsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Berichte', ['only' => ['index', 'SearchAccessories', 'AccessoriesReportsExport']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Reports.accessories_reports');
    }

    public function SearchAccessories(Request $request)
    {


        $radio = $request->radio;
        $product_category = $request->product_category;
        $product_brand = $request->product_brand;
        $start_at = $request->start_at ? Carbon::parse($request->start_at)->toDateString() : null;
        $end_at = $request->end_at ? Carbon::parse($request->end_at)->toDateString() : null;


        //Search With Invoice Type
        if ($radio == 1) {

            //Without Select Date
            if ($product_category && $product_brand && $start_at == '' && $end_at == '') {

                if ($product_brand == 'Alle') {

                    $products = Accessories::select('*')->where('section_id', '=', $product_category)->get();
                    return view('Reports.accessories_reports', compact('product_category', 'product_brand'))->withDetails($products);

                } else {

                    $products = Accessories::select('*')->where('section_id', '=', $product_category)->where('brand', '=', $product_brand)->get();
                    return view('Reports.accessories_reports', compact('product_category', 'product_brand'))->withDetails($products);

                }

            } //With Select Date
            else {

                if ($product_brand == 'Alle') {

                    $products = Accessories::whereBetween('created_at', [$start_at, $end_at])->where('section_id', '=', $product_category)->get();
                    if ($start_at != '' && $end_at != '') {
                        $start_at = Carbon::parse($start_at)->format('d.m.Y');
                        $end_at = Carbon::parse($end_at)->format('d.m.Y');
                    }
                    return view('Reports.accessories_reports', compact('product_category', 'product_brand', 'start_at', 'end_at'))->withDetails($products);
                } else {

                    $products = Accessories::whereBetween('created_at', [$start_at, $end_at])->where('section_id', '=', $product_category)->where('brand', '=', $product_brand)->get();
                    if ($start_at != '' && $end_at != '') {
                        $start_at = Carbon::parse($start_at)->format('d.m.Y');
                        $end_at = Carbon::parse($end_at)->format('d.m.Y');
                    }
                    return view('Reports.accessories_reports', compact('product_category', 'product_brand', 'start_at', 'end_at'))->withDetails($products);

                }
            }

        } //Search With Invoice Number
        else {

            $products = Accessories::select('*')->where('name', 'LIKE', '%' . $request->product_name . '%')->get();
            return view('Reports.accessories_reports')->withDetails($products);

        }


    }

    public function AccessoriesReportsExport(Request $request, $PageId)
    {
        $details = json_decode($request->input('details'), true);
        return Excel::download(new ExportExcel($PageId, $details), 'Zubehörberichte.xlsx');

    }
}
