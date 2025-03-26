<?php
declare(strict_types=1);

namespace PySosu\SiteLegals\Services;

use Illuminate\Support\Str;
use PySosu\SiteLegals\Models\SiteLegal;
use Illuminate\Database\Eloquent\Collection;
use Sosupp\SlimDashboard\Contracts\Crudable;
use Illuminate\Support\Collection as SupportCollection;
use Sosupp\SlimDashboard\Concerns\Filters\CommonFilters;
use Sosupp\SlimDashboard\Concerns\Filters\WithDateFormat;

class SiteLegalCrudService implements Crudable
{
    use CommonFilters, WithDateFormat;

    private $legalPages = [];

    public function __construct()
    {
        // $this->legalPages;
    }

    public function make(int|string|null $id = null, array $data): SiteLegal
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

    public function one(int|string $id): SiteLegal|null
    {
        return SiteLegal::where('id', $id)
        ->orWhere('slug', $id)
        ->first();
    }

    // To be used to show both active, in-active and deleted pages on admin dashboard
    public function list(?int $limit = null, array $cols = ['*'])
    {
        return SiteLegal::query()
        ->withTrashed()
        ->when(!empty($this->searchTerm), function($q){
            $q->search($this->searchTerm);
        })
        ->dated($this->selectedDate)
        ->orderBy($this->orderByColumn, $this->orderByDirection)
        ->get($cols);
    }

    public function paginate(?int $limit = null, array $cols = ['*'])
    {
        return SiteLegal::query()
        ->withTrashed()
        ->when(!empty($this->searchTerm), function($q){
            $q->search($this->searchTerm);
        })
        ->dated($this->selectedDate)
        ->orderBy($this->orderByColumn, $this->orderByDirection)
        ->paginate(perPage: $limit);
    }

    public function remove(int|string $id) { }

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
