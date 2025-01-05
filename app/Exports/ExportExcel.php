<?php

namespace App\Exports;

use App\Models\Accessories;
use App\Models\handys;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcel implements FromCollection,WithHeadings
{

    protected $PageId;

    function __construct($PageId) {

        $this->PageId = $PageId;

    }

    public function headings(): array
    {

        if ($this->PageId == 1) {
            return ["Name" , "Kategorie" , "Zustand" , "Preis" , "Menge" , "Beschreibung"];
         }
        elseif ($this->PageId == 2) {
            return ["Name" , "Kategorie" , "Marke" , "Preis" , "Beschreibung"];
        }

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //Export All Mobiles
        if ($this->PageId == 1) {
            return handys::select('name', 'section_name', 'status', 'preis', 'amount', 'note')->get();
        }
        elseif ($this->PageId == 2) {
            return Accessories::select('name', 'section_name', 'brand' , 'price', 'note')->get();
        }
    }

}
