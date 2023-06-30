<?php
namespace PySosu\SiteLegals\Http\Controllers;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PySosu\SiteLegals\Custom\LegalStatus;
use PySosu\SiteLegals\Models\SiteLegal;

class AdminSiteLegalsController extends Controller
{
    public function index()
    {
        $pages = SiteLegal::all();
        return view('SiteLegals::dashboard.index', compact(
            'pages',
        ));
    }

    public function create()
    {
        $statuses = LegalStatus::legalStatuses();

        dd($statuses);
        return view('SiteLegals::dashboard.create', compact(
            'statuses',
        ));
    }

    public function store(Request $request)
    {

        $input = $this->validateInputs($request);

        SiteLegal::create([
            'page_name' => $input['page_name'],
            'slug' => Str::slug($input['page_name']),
            'status' => $input['status'],
            'description' => $input['description'],
            'content' => $input['content'],
            'banner' => $input['banner'] ?? null,
        ]);

        return redirect()->route('site.info.index');
    }

    public function show($id)
    {
        $page = SiteLegal::findOrFail($id);
        return view('SiteLegals::dashboard.show', compact(
            'page',
        ));
    }

    public function edit($id)
    {
        $page = SiteLegal::findOrFail($id);
        return view('SiteLegals::dashboard.edit', compact(
            'page',
        ));
    }

    public function update(Request $request, $id)
    {

        // dd("yes");
        $input = $this->validateInputs($request);

        $page = SiteLegal::findOrFail($id);
        $page->page_name = $input['page_name'];
        $page->slug = Str::slug($input['page_name']);
        $page->description = $input['description'];
        $page->content = $input['content'];
        $page->banner = $input['banner'] ?? null;

        $page->save();

        return redirect()->route('site.info.index');
    }

    public function destroy($id)
    {
        SiteLegal::destroy($id);
        return redirect()->route('site.info.index');
    }

    /**
     * Custom validate for inputs
     * This can be moved into laravel's request class.
     * This is done here for simplicity sake.
     *
     * @param Request $request
     * @return void
     */
    private function validateInputs($request)
    {
        return $request->validate([
            'page_name' => 'required|string',
            'status' => 'required|string',
            'description' => 'string|nullable',
            'content' => 'required|string',
            'banner' => 'image|nullable',
        ]);
    }
}
