<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Addon;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AddonController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('addon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addon.index');
    }

    public function create()
    {
        abort_if(Gate::denies('addon_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addon.create');
    }

    public function edit(Addon $addon)
    {
        abort_if(Gate::denies('addon_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addon.edit', compact('addon'));
    }

    public function show(Addon $addon)
    {
        abort_if(Gate::denies('addon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.addon.show', compact('addon'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['addon_create', 'addon_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                    'image|dimensions:max_width=%s,max_height=%s',
                    request()->input('max_width', 100000),
                    request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Addon();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
