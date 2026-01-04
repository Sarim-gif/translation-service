<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Translation;
use App\Services\TranslationService;
use Illuminate\Http\Request;

class TranslationController extends Controller {

    public function __construct(private TranslationService $service) {}

    public function store(Request $r) {

        $r->validate([
            'key' => 'required',
            'value' => 'required',
            'locale_id' => 'required|exists:locales,id',
            'tags.*' => 'exists:tags,id'
        ]);

        return response()->json(
            $this->service->create($r->only(['key','value','locale_id']), $r->tags ?? []),
            201
        );
    }

    public function index(Request $r) {
        return response()->json($this->service->search($r->all()));
    }

    public function update(Request $r, $id)
    {
        $t = Translation::findOrFail($id);
        $t->update($r->only(['key','value','locale_id']));
        $t->tags()->sync($r->tags ?? []);
        return response()->json($t);
    }

    public function export(Request $r)
    {
        $locale = $r->get('locale', 'en');
        return response()->json($this->service->export($locale));
    }

}
