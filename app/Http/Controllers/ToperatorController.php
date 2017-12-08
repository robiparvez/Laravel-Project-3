<?php

namespace App\Http\Controllers;
use App\Toperator;
use Illuminate\Http\Request;
use Image;
use Session;
use Storage;

class ToperatorController extends Controller
{

    public function index()
    {
        $toperators_index = Toperator::all();
        return view('toperators.index')->with('toperators_index', $toperators_index);
    }

    public function create()
    {
        $toperators_create = Toperator::all();
        return view('toperators.create')->with('toperators_create', $toperators_create);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name'     => 'required|min:3|max:10',
            'password' => 'required',
            'address'  => 'required|min:3',
            'logo'     => 'sometimes|mimes: jpg,jpeg,png,bmp',
        ]);

        $toperators_store           = new Toperator();
        $toperators_store->name     = ucfirst($request->name);
        $toperators_store->password = bcrypt($request->password);
        $toperators_store->address  = $request->address;

        if ($request->hasfile('logo'))
        {

            $logo = $request->file('logo');

            $filename = time() . '.' . $logo->getClientOriginalExtension();

            $location = public_path('images/' . $filename);

            Image::make($logo)->resize(200, 200)->save($location);

            $toperators_store->logo = $filename;
        }

        $toperators_store->save();

        $request->session()->flash('store_msg', 'Operator successfully created!');

        return redirect()->route('toperators.show', $toperators_store->id);
    }

    public function show($id)
    {
        $toperators_show = Toperator::find($id);
        return view('toperators.show')->with('toperators_show', $toperators_show);
    }

    public function edit($id)
    {
        $toperators_edit = Toperator::find($id);
        return view('toperators.edit')->with('toperators_edit', $toperators_edit);
    }

    public function update(Request $request, $id)
    {
        $toperators_update = Toperator::find($id);

        $this->validate($request, [

            'name'     => 'required',
            'password' => 'required',
            'address'  => 'required',
            'logo'     => 'required|mimes:jpg,jpeg,png,bmp',
        ]);

        $toperators_update = Toperator::find($id);

        $toperators_update->name     = ucfirst($request->name);
        $toperators_update->password = bcrypt($request->password);
        $toperators_update->address  = $request->address;

        if ($request->hasFile('logo'))
        {

            $logo_var = $request->file('logo');

            $filename = time() . '.' . $logo_var->getClientOriginalExtension();

            $location = public_path('images/' . $filename);

            Image::make($logo_var)->resize(200, 200)->save($location);

            $oldfile = $toperators_update->logo;

            $toperators_update->logo = $filename;

            Storage::delete($oldfile);
        }

        $toperators_update->save();

        Session::flash('update_msg', 'Operator successfully updated!');

        return redirect()->route('toperators.show', $toperators_update->id);

    }

    public function destroy($id)
    {
        $toperators_delete = Toperator::find($id);

        Storage::delete($toperators_delete->logo);

        $toperators_delete->delete();

        Session::flash('delete_smg', 'Operator successfully deleted!');

        return redirect()->route('toperators.index', $toperators_delete->id);
    }
}
