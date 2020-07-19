<?php

namespace App\Repositories;

use App\Http\Requests\MedicamentRequest;
use App\Models\Medicament;
use Barryvdh\DomPDF\PDF;

class MedicamentRepository
{

    public function createThumbnail($data)
    {
        if ($data['thumbnail'] != null) {
            if ($data['thumbnail']->getMimeType() == 'image/jpeg') {
                request()->thumbnail->move(public_path() . '/medicaments', $data['name'] . '-thumbnail');
                $data['thumbnail'] = $data['name'] . '-thumbnail';
            }
        } else {
            $data['thumbnail'] = 'ampoule-default.png';
        }
        return $data;
    }

    public function createFlyer($data, $PDF)
    {
        if ($data['flyer'] != null) {
            if ($data['flyer']->getMimeType() == 'application/pdf') {
                $PDF->loadHtml($data['flyer'])->save('/flyer' . $data['name'] . $data['flyer']->getClientOriginalExtension());
//                request()->flyer->move(public_path() . '/flyer', $data['name'] . '-flyer');
                $data['flyer'] = $data['name'] . $data['flyer']->getClientOriginalExtension();
            }
        } elseif ($data['flyer'] == null)
            $data['flyer'] = 'Not Found';
        else {
            return $data;
        }
        return $data;
    }

    public function editFlyer($request, $PDF, $id)
    {
        $data = Medicament::find($id);
        if (($request->flyer != null) && ($request->flyer->getMimeType() == 'application/pdf')) {
            $PDF->loadHtml($request->flyer)->save('/flyer' . $data['name'] . $data['flyer']->getClientOriginalExtension());
                $data['flyer'] = $data['name'] . '-flyer';
        } elseif ($data['flyer'] == null)
            $data['flyer'] = 'Not Found';
        else {
            return $data;
        }
        return $data;
    }

    public function farmAssociate($data)
    {
        $data['farm_id'] = auth()->user()->farm_id;
        return $data;
    }


    public function editThumbnail($request)
    {
        if ($request->thumbnail != null) {
            $thumbnail = $request->file('thumbnail');
            if ($thumbnail->getMimeType() == 'image/jpeg') {
                request()->thumbnail->move(public_path() . '/medicaments', $request->name . '-thumbnail');
//                $data = $request->all();
                $data['thumbnail'] = $request->name . '-thumbnail';
            }
        } else {
//            $data = $request->all();
            $data['thumbnail'] = 'ampoule-default.png';
        }
        $data = $request->all();
        return $data;
    }
}
