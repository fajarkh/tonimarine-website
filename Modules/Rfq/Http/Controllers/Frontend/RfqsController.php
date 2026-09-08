<?php

namespace Modules\Rfq\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Modules\Rfq\Models\Rfq;

class RfqsController extends Controller
{
    public $module_title;

    public $module_name;

    public $module_path;

    public $module_icon;

    public $module_model;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Rfqs';

        // module name
        $this->module_name = 'rfqs';

        // directory path of the module
        $this->module_path = 'rfq::frontend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Rfq\Models\Rfq";
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'List';

        $$module_name = $module_model::latest()->paginate();

        return view(
            "$module_path.$module_name.index",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular')
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $id = decode_id($id);

        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Show';

        $$module_name_singular = $module_model::findOrFail($id);

        return view(
            "$module_path.$module_name.show",
            compact('module_title', 'module_name', 'module_icon', 'module_action', 'module_name_singular', "$module_name_singular")
        );
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'vessel_name' => ['required', 'string', 'max:255'],
            'imo_number' => ['nullable', 'string', 'max:50'],
            'port' => ['required', 'string', 'max:255'],
            'eta' => ['required', 'date'],
            'contact' => ['required', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'requirement' => ['required', 'string'],
            'attachment' => ['nullable', 'file', 'mimes:pdf,xls,xlsx', 'max:10240'],
        ]);

        Rfq::create([
            'name' => $validated['vessel_name'],
            'slug' => Str::slug($validated['vessel_name'].'-'.now()->format('YmdHis')),
            'vessel_name' => $validated['vessel_name'],
            'imo_number' => $validated['imo_number'] ?? null,
            'port' => $validated['port'],
            'eta' => $validated['eta'],
            'contact' => $validated['contact'],
            'company' => $validated['company'] ?? null,
            'description' => $validated['requirement'],
            'requirement' => $validated['requirement'],
            'attachment_path' => $request->file('attachment')?->store('rfqs', 'public'),
            'status' => 2,
        ]);

        return redirect()->to(url()->previous().'#rfq')->with('success', __('rfq::text.submitted_successfully'));
    }
}
