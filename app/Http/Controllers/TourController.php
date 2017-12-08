<?php

namespace App\Http\Controllers;

use App\Toperator;
use App\Tour;
use Illuminate\Http\Request;
use Image;
use Session;
use Storage;

class TourController extends Controller
{
    public function index()
    {
        $indexTour = Tour::all();
        return view('tours.index')->with('indexTour', $indexTour);
    }

    public function create()
    {
        $createTour = Tour::all();

        $toperator = Toperator::all();

        $topArray = array();

        foreach ($toperator as $t_op)
        {
            $topArray[$t_op->id] = $t_op->name;
        }
        return view('tours.create')->with('createTour', $createTour)->with('topArray', $topArray);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'         => 'required',
            'description'  => 'required|min:6',
            'address'      => 'required|min:6',
            'phone'        => 'required|regex:/(01)[0-9]{9}/|size:11',
            'image'        => 'required|mimes:jpeg,png,bmp',
            'toperator_id' => 'required',
        ],
            [
                'name.required'        => 'Please enter your name',
                'description.required' => 'Please enter description',
                'phone.size'           => 'Phone number must be 11 digits',
                'image.required'       => 'please upload an image!',
            ]);

        $storeTour = new Tour();

        $storeTour->name         = htmlspecialchars(ucfirst($request->name));
        $storeTour->description  = htmlspecialchars($request->description);
        $storeTour->address      = htmlspecialchars($request->address);
        $storeTour->phone        = $request->phone;
        $storeTour->toperator_id = $request->toperator_id;

        if ($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);

            Image::make($image)->resize(200, 200)->save($location);

            $storeTour->image = $filename;
        }
        $storeTour->save();

        $request->session()->flash('store_msg', 'Tour created successfully!');
        return redirect()->route('tours.show', $storeTour->id);
    }

    public function show($id)
    {
        $showTour = Tour::findorFail($id);
        return view('tours.show')->with('showTour', $showTour);
    }

    public function edit($id)
    {

        $editTour = Tour::findorFail($id);

        $editOperator = Toperator::all();

        $editOperatorArray = array();

        foreach ($editOperator as $operator)
        {
            $editOperatorArray[$operator->id] = $operator->name;
        }

        return view('tours.edit')->with('editTour', $editTour)->with('editOperatorArray',$editOperatorArray);
    }

    public function update(Request $request, $id)
    {
        $updateTour               = Tour::find($id);

        $this->validate($request, [
            'name'         => 'required|min:3',
            'description'  => 'required|min:6',
            'address'      => 'required|min:6',
            'phone'        => 'required|regex:/(01)[0-9]{9}/|numeric',
            'image'        => 'required|mimes:jpg,jpeg,png,bmp',
            'toperator_id' => 'required',
        ],
            [
                'name.required'         => 'Please enter your name',
                'description.required'  => 'Please enter description',
                'phone.size'            => 'Phone number must be 11 digits',
                'image.required'        => 'please upload an image!',
                'toperator_id.required' => 'please select an operator!',
            ]);

        $updateTour               = Tour::find($id);
        $updateTour->name         = htmlspecialchars($request->name);
        $updateTour->description  = htmlspecialchars($request->description);
        $updateTour->address      = htmlspecialchars($request->address);
        $updateTour->phone        = $request->phone;
        $updateTour->toperator_id = $request->toperator_id;

        if ($request->hasFile('image'))
        {
            $image    = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);

            Image::make($image)->resize(200, 200)->save($location);

            $oldfile = $updateTour->image;

            $updateTour->image = $filename;

            Storage::delete($oldfile);
        }
        $updateTour->save();

        return redirect()->route('tours.show', $updateTour->id)->with('update_msg', 'Tour Updated successfully!');

    }

    public function destroy($id)
    {
        $deleteTour = Tour::find($id);
        Storage::delete($deleteTour->image);
        $deleteTour->delete();
        return redirect()->route('tours.index')->with('delete_msg', 'Tour Deleted Successfully!');
    }
}
