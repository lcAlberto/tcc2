<?php

namespace App\Repositories;

use App\Http\Requests\MedicamentRequest;
use App\Models\Medicament;
use Barryvdh\DomPDF\PDF;

class MedicamentRepository
{

    public function createThumbnail($data)
    {
        if (isset($data['thumbnail'])) {
            if ($data['thumbnail'] != null) {
                if ($data['thumbnail']->getMimeType() == 'image/jpeg') {
                    request()->thumbnail->move(public_path() .
                        '/medicaments', $data['name'] .
                        '-thumbnail' .
                        $data['flyer']->getClientOriginalExtension());
                    $data['thumbnail'] = $data['name'] .
                        '-thumbnail' .
                        $data['flyer']->getClientOriginalExtension();
                }
            }
        } else {
            $data['thumbnail'] = 'ampoule-default.png';
        }
        return $data;
    }

    public function createFlyer($data)
    {
        if ($data['flyer']->getMimeType() == 'application/pdf') {
            request()->flyer->move(public_path() .
                '/flyer', $data['name'] .
                '-flyer' .
                $data['flyer']->getClientOriginalExtension());
            $data['flyer'] = $data['name'] .
                '-flyer' .
                $data['flyer']->getClientOriginalExtension();
        } elseif ($data['flyer'] == null)
            $data['flyer'] = 'Not Found';
        else {
            return $data;
        }
        return $data;
    }

    public function editFlyer($current, $request)
    {
        $data = $request->all();
        if (isset($current['flyer'])) {
            $data['flyer'] = $current['flyer'];
            return $data;
        } else
            return $this->createFlyer($data);
    }

    public function editThumbnail($current, $data)
    {
        if (isset($current['thumbnail'])) {
            $data['thumbnail'] = $current['thumbnail'];
            return $data;
        } else
            return $this->createThumbnail($data);
    }

    public function farmAssociate($data)
    {
        $data['farm_id'] = auth()->user()->farm_id;
        $data['user_id'] = auth()->user()->user_id;
        return $data;
    }


//    public function editThumbnail($request)
//    {
//        if ($request->thumbnail != null) {
//            $thumbnail = $request->file('thumbnail');
//            if ($thumbnail->getMimeType() == 'image/jpeg') {
//                request()->thumbnail->move(public_path() . '/medicaments', $request->name . '-thumbnail');
////                $data = $request->all();
//                $data['thumbnail'] = $request->name . '-thumbnail';
//            }
//        } else {
////            $data = $request->all();
//            $data['thumbnail'] = 'ampoule-default.png';
//        }
//        $data = $request->all();
//        return $data;
//    }
}
