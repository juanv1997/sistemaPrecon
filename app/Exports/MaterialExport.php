<?php

namespace App\Exports;

use App\Models\Material;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
//use Maatwebsite\Excel\Concerns\WithColumnFormatting;
//use PhpOffice\PhpSpreadsheet\Shared\Date;
//use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class MaterialExport implements FromCollection,WithHeadings//,WithColumnFormatting
{   
    public function headings():array{

        return [

            'Código',
            'Tipo',
            'Unidad',
            'Precio',
            'Descripción',
            'Obervaciones',
            'Stock',
            'Importe'
        ];

    }
    // public function columnFormats(): array
    // {
    //     return [
    //         'B' => NumberFormat::FORMAT_DATE_DDMMYYYY,
    //         'C' => NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE,
    //     ];
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Material::all();
        return collect(Material::join('tbl_unidad','tbl_material.unidad_id','=','tbl_unidad.unidad_id')
                    ->join('tbl_tipo','tbl_material.tipo_id','=','tbl_tipo.tipo_id')
                    ->select('tbl_material.material_cod','tbl_tipo.tipo_nombre',
                              'tbl_unidad.unidad_nombre','tbl_material.material_precio',
                              'tbl_material.material_descrip','tbl_material.material_observacion',
                              'tbl_material.material_stock','tbl_material.material_importe')->get());
    }
}
