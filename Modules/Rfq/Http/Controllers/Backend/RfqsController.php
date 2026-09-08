<?php

namespace Modules\Rfq\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class RfqsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Rfqs';

        // module name
        $this->module_name = 'rfqs';

        // directory path of the module
        $this->module_path = 'rfq::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Rfq\Models\Rfq";
    }

    /**
     * Retrieves the RFQ data for the index page.
     */
    public function index_data(): JsonResponse
    {
        $rfqs = $this->module_model::query()->select('id', 'vessel_name', 'name', 'port', 'status', 'updated_at');

        return DataTables::of($rfqs)
            ->editColumn('name', function ($data) {
                return '<strong>'.e($data->vessel_name ?: $data->name).'</strong>';
            })
            ->addColumn('status_label', function ($data) {
                return $data->status_label;
            })
            ->addColumn('action', function ($data) {
                $module_name = $this->module_name;

                return view(view: 'backend.includes.action_column', data: compact('module_name', 'data'));
            })
            ->editColumn('updated_at', function ($data) {
                return $data->updated_at->diffForHumans();
            })
            ->rawColumns(['name', 'status_label', 'action'])
            ->make(true);
    }

    /**
     * Store a new RFQ resource.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'vessel_name' => ['required', 'string', 'max:255'],
            'port' => ['required', 'string', 'max:255'],
            'eta' => ['nullable', 'date'],
            'contact' => ['required', 'string', 'max:255'],
            'requirement' => ['required', 'string'],
            'attachment' => ['nullable', 'file', 'mimes:pdf,xls,xlsx', 'max:10240'],
        ]);

        $request->merge([
            'name' => $request->input('vessel_name'),
            'slug' => Str::slug($request->input('vessel_name').'-'.now()->format('YmdHis')),
            'description' => $request->input('requirement'),
        ]);

        if ($request->hasFile('attachment')) {
            $request->merge([
                'attachment_path' => $request->file('attachment')->store('rfqs', 'public'),
            ]);
        }

        return parent::store($request);
    }

    /**
     * Update an existing RFQ resource.
     *
     * @param  int  $id
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'vessel_name' => ['required', 'string', 'max:255'],
            'port' => ['required', 'string', 'max:255'],
            'eta' => ['nullable', 'date'],
            'contact' => ['required', 'string', 'max:255'],
            'requirement' => ['required', 'string'],
            'attachment' => ['nullable', 'file', 'mimes:pdf,xls,xlsx', 'max:10240'],
        ]);

        $request->merge([
            'name' => $request->input('vessel_name'),
            'description' => $request->input('requirement'),
        ]);

        if ($request->hasFile('attachment')) {
            $request->merge([
                'attachment_path' => $request->file('attachment')->store('rfqs', 'public'),
            ]);
        }

        return parent::update($request, $id);
    }
}
