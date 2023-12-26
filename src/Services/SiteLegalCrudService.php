<?php
declare(strict_types=1);

namespace PySosu\SiteLegals\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Str;
use PySosu\SiteLegals\Models\SiteLegal;

class SiteLegalCrudService
{
    private $legalPages = [];

    public function __construct()
    {
        // $this->legalPages;
    }

    public function make(int|string $id = null, array $data): SiteLegal
    {
        return SiteLegal::updateOrCreate(
            [
                'id' => $id,
            ],
            [
                'page_name' => $data['pageName'],
                'slug' => Str::slug($data['pageName']),
                'description' => $data['description'] ?? null,
                'content' => $data['content'] ?? null,
                'status' => $data['status'] ?? 'active',
                'banner' => $data['banner'] ?? null,
            ],
        );
    }

    public function makeMany(array $data)
    {
        return SiteLegal::upsert($data, []);
    }

    public function one(int|string $id): SiteLegal
    {
        return SiteLegal::where('id', $id)
        ->orWhere('slug', $id)
        ->first();
    }

    // To be used to show both active and inactive pages on admin dashboard
    public function list($status = 'active')
    {
        return SiteLegal::withTrashed()->get();
    }

    // Intend to be used for public
    public function pages($status = 'active'): Collection|SupportCollection
    {
        return SiteLegal::where('status', $status)->get();
    }

    public function pageByName($pageName): SiteLegal
    {
        return SiteLegal::where('page_name', $pageName)
        ->first();
    }

    public function toggleStatus(string|int $id, string|int $status)
    {
        return SiteLegal::where('id', $id)->update([
            'status' => $status
        ]);
    }

    public function delete(string|int $id): int
    {
        return SiteLegal::where('id', $id)->delete();
    }

}
