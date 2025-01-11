<?php

namespace App\Exports;

use App\Models\Accessories;
use App\Models\handys;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportExcel implements FromCollection,WithHeadings
{

    protected $PageId;
    protected $data;

    function __construct($PageId , $data = null) {

        $this->PageId = $PageId;
        $this->data = $data;

    }

    public function headings(): array
    {

        if ($this->PageId == 1 || $this->PageId == 3) {
            return ["Name" , "Kategorie" , "Zustand" , "Preis" , "Menge" , "Beschreibung"];
         }
        elseif ($this->PageId == 2 || $this->PageId == 4) {
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
            return handys::select('name', 'section_name', 'status', 'preis', 'amount', DB::raw("COALESCE(note, '---') as note"))->get();
        }
        //Export All Accessories
        elseif ($this->PageId == 2) {
            return Accessories::select('name', 'section_name', 'brand' , 'price', DB::raw("COALESCE(note, '---') as note"))->get();
        }

        //Export Mobiles Reports
        elseif ($this->PageId == 3) {
            return collect($this->data)->map(function ($item) {
                return [
                    'name' => $item['name'],
                    'section_name' => $item['section_name'],
                    'status' => $item['status'],
                    'preis' => $item['preis'],
                    'amount' => $item['amount'],
                    'note' => $item['note'] ?? '---',
                ];
            });
        }

        //Export Accessories Reports
        elseif ($this->PageId == 4) {
            return collect($this->data)->map(function ($item) {
                return [
                    'name' => $item['name'],
                    'section_name' => $item['section_name'],
                    'brand' => $item['brand'],
                    'price' => $item['price'],
                    'note' => $item['note'] ?? '---',
                ];
            });
        }
    }

}
