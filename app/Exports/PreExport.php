<?php

namespace App\Exports;

use App\Models\Prefabricado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PreExport implements FromCollection,WithHeadings
{

    public function headings():array{

        return [

            'Código',
            'Tipo',
            'Espesor',
            'Resistencia',
            'Color',
            'Unidad',
            'Precio',
            'Dimension',
            'Descripción',
            'Obervaciones',
            'Stock',
            'Importe'
        ];

    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Prefabricado::join('tbl_capa','tbl_prefabricado.capa_id','=','tbl_capa.capa_id')
                            ->join('tbl_color','tbl_prefabricado.color_id','=','tbl_color.color_id')
                            ->join('tbl_dimension','tbl_prefabricado.dimension_id','=','tbl_dimension.dimension_id')
                            ->join('tbl_espesor','tbl_prefabricado.espesor_id','=','tbl_espesor.espesor_id')
                            ->join('tbl_resistencia','tbl_prefabricado.resistencia_id','=','tbl_resistencia.resistencia_id')
                            ->join('tbl_tipo','tbl_prefabricado.tipo_id','=','tbl_tipo.tipo_id')
                            ->join('tbl_unidad','tbl_prefabricado.unidad_id','=','tbl_unidad.unidad_id')
                            ->select('tbl_prefabricado.pre_codigo','tbl_tipo.tipo_nombre',
                                    'tbl_espesor.espesor_cantidad','tbl_resistencia.resistencia_cantidad',
                                    'tbl_color.color_inicial','tbl_unidad.unidad_nombre',
                                    'tbl_prefabricado.pre_precio','tbl_dimension.dimension_medida',
                                    'tbl_prefabricado.pre_descripcion','tbl_prefabricado.pre_observacion',
                                    'tbl_prefabricado.pre_stock','tbl_prefabricado.pre_importe')->get();
    }
}
