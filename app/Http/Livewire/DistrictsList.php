<?php

namespace App\Http\Livewire;

use App\Models\Locality;
use App\Models\Region;
use Livewire\Component;
use Livewire\WithPagination;

class DistrictsList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $region = '';
    public $locality = '';
    public $district = '';

    public function render()
    {

        $list = Locality::leftJoin('districts', 'localities.id', '=', 'districts.locality_id')
            ->select(
                'localities.name as lname',
                'localities.name_translit as lname_translit',
                'districts.name as dname',
                'districts.name_translit as dname_translit',
                'regions.name as rname',
                'regions.name_translit as rname_translit'
            )

            ->join('regions', 'regions.id', '=', 'localities.region_id')
            ->whereRaw('
                (districts.name like ? AND (regions.name like ? OR localities.name like ?))
                OR
                (regions.name like ? AND (districts.name like ? OR localities.name like ?))
                OR
                (localities.name like ? AND (districts.name like ? OR regions.name like ?))
            ',
                [
                    '%'.$this->district.'%',
                    '%'.$this->region.'%',
                    '%'.$this->locality.'%',

                    '%'.$this->region.'%',
                    '%'.$this->district.'%',
                    '%'.$this->locality.'%',

                    '%'.$this->locality.'%',
                    '%'.$this->district.'%',
                    '%'.$this->region.'%',
                ]
            )


            ->paginate(10);

        return view('livewire.districts-list', ['items' => $list]);
    }
}
