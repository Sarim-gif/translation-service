<?php

namespace App\Repositories;

use App\Models\Translation;

class TranslationRepository {

    public function create(array $data) {
        return Translation::create($data);
    }

    public function search(array $filters) {
        $q = Translation::with('tags','locale');

        if (!empty($filters['key']))
            $q->where('key','like','%'.$filters['key'].'%');

        if (!empty($filters['content']))
            $q->where('value','like','%'.$filters['content'].'%');

        if (!empty($filters['locale']))
            $q->whereHas('locale', fn($x)=>$x->where('code',$filters['locale']));

        if (!empty($filters['tag']))
            $q->whereHas('tags', fn($x)=>$x->where('name',$filters['tag']));

        return $q->paginate(50);
    }

    public function export(string $locale) {
        return Translation::whereHas('locale', fn($q)=>$q->where('code',$locale))->pluck('value','key');
    }
}
