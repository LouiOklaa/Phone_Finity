<?php

namespace App\Http\Controllers;

use App\Models\handys;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Exports\ExportExcel;
use Maatwebsite\Excel\Facades\Excel;


class MobilesReportsController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Berichte', ['only' => ['index', 'SearchMobiles', 'MobilesReportsExport']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Reports.mobiles_reports');
    }

    public function SearchMobiles(Request $request)
    {


        $radio = $request->radio;
        $mobiles_type = $request->mobiles_type;
        $mobiles_status = $request->mobiles_status;
        $start_at = $request->start_at ? Carbon::parse($request->start_at)->toDateString() : null;
        $end_at = $request->end_at ? Carbon::parse($request->end_at)->toDateString() : null;
        $mobile_name = $request->mobile_name;


        //Search With Invoice Type
        if ($radio == 1) {

            //Without Select Date
            if ($mobiles_type && $mobiles_status && $start_at == '' && $end_at == '') {

                if ($mobiles_status == 'Alle') {

                    $mobiles = handys::select('*')->where('section_id', '=', $mobiles_type)->get();
                    return view('Reports.mobiles_reports', compact('mobiles_status', 'mobiles_type', 'radio'))->withDetails($mobiles);

                } else {

                    $mobiles = handys::select('*')->where('section_id', '=', $mobiles_type)->where('status', '=', $mobiles_status)->get();
                    return view('Reports.mobiles_reports', compact('mobiles_status', 'mobiles_type', 'radio'))->withDetails($mobiles);

                }

            } //With Select Date
            else {

                if ($mobiles_status == 'Alle') {

                    $mobiles = handys::whereBetween('created_at', [$start_at, $end_at])->where('section_id', '=', $mobiles_type)->get();
                    if ($start_at != '' && $end_at != '') {
                        $start_at = Carbon::parse($start_at)->format('d.m.Y');
                        $end_at = Carbon::parse($end_at)->format('d.m.Y');
                    }
                    return view('Reports.mobiles_reports', compact('mobiles_status', 'mobiles_type', 'start_at', 'end_at', 'radio'))->withDetails($mobiles);
                } else {

                    $mobiles = handys::whereBetween('created_at', [$start_at, $end_at])->where('section_id', '=', $mobiles_type)->where('status', '=', $mobiles_status)->get();
                    if ($start_at != '' && $end_at != '') {
                        $start_at = Carbon::parse($start_at)->format('d.m.Y');
                        $end_at = Carbon::parse($end_at)->format('d.m.Y');
                    }
                    return view('Reports.mobiles_reports', compact('mobiles_status', 'mobiles_type', 'start_at', 'end_at', 'radio'))->withDetails($mobiles);

                }
            }

        } //Search With Invoice Number
        else {

            $mobiles = handys::select('*')->where('name', 'LIKE', '%' . $request->mobile_name . '%')->get();
            return view('Reports.mobiles_reports', compact('radio', 'mobile_name'))->withDetails($mobiles);


        }

    }

    public function MobilesReportsExport(Request $request, $PageId)
    {
        $details = json_decode($request->input('details'), true);
        return Excel::download(new ExportExcel($PageId, $details), 'Handyberichte.xlsx');

    }
}
