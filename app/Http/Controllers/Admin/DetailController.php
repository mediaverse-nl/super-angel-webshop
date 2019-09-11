<?php

namespace App\Http\Controllers\Admin;

use App\Detail;
use App\Http\Requests\Admin\DetailStoreRequest;
use App\Http\Requests\Admin\DetailUpdateRequest;
use App\Http\Requests\Admin\PropertyStoreRequest;
use App\Notifications\DeleteModelNotification;
use App\Notifications\StoreModelNotification;
use App\Notifications\UpdateModelNotification;
use App\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DetailController extends Controller
{
    protected $detail;
    protected $property;

    public function __construct(Detail $detail, Property $property)
    {
        $this->detail = $detail;
        $this->property = $property;
    }

    public function index()
    {
        $details = $this->detail->get();
        $property = $this->property->with('details')->get();

        return view('admin.detail.index', compact('details', 'property'));
    }

    public function create()
    {
        return view('admin.detail.create');
    }

    public function storeDetail(DetailStoreRequest $request)
    {
        $p = $this->detail;
        $p->property_id = $request->property_id;
        $p->value = $request->value;
        $p->save();

        auth()->user()->notify(new StoreModelNotification($p));

        return redirect()->route('admin.detail.index');
    }

    public function updateDetail(DetailUpdateRequest $request, $id)
    {
        $d = $this->detail->findOrFail($id);
        $d->value = $request->value;
        $d->save();

        auth()->user()->notify(new UpdateModelNotification($d));

        return redirect()->route('admin.detail.index');
    }

    public function storeProperty(PropertyStoreRequest $request)
    {
        $p = $this->property;
        $p->value = $request->value;
        $p->save();

        auth()->user()->notify(new StoreModelNotification($p));

        return redirect()->route('admin.detail.index');
    }


//    public function update(DetailUpdateRequest $request, $id)
//    {
//
//        $d = $this->detail->findOrFail($id);
//        $d->value = $request->value;
//        $d->save();
//
//        auth()->user()->notify(new UpdateModelNotification($d));
//
//        return redirect()->route('admin.detail.index');
//    }

    public function edit($id)
    {
        $detail = $this->detail->findOrFail($id);

        return view('admin.detail.edit', compact('detail'));
    }

    public function destroy(Request $request, $id)
    {
        $d = $this->detail
            ->findOrFail($id);

            $d->delete();

        auth()->user()->notify(new DeleteModelNotification($d));

        return redirect()
            ->route('admin.detail.index');
    }

    public function destroyProperty(Request $request, $id)
    {
        $d = $this->property
            ->findOrFail($id);

            $d->delete();

        auth()->user()->notify(new DeleteModelNotification($d));

        return redirect()
            ->route('admin.detail.index');
    }

}
