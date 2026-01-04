<?php
namespace App\Services;

use App\Repositories\TranslationRepository;

class TranslationService {

    public function __construct(private TranslationRepository $repo) {}

    public function create(array $data, array $tags = []) {
        $translation = $this->repo->create($data);
        $translation->tags()->sync($tags);
        return $translation;
    }

    public function search(array $filters) {
        return $this->repo->search($filters);
    }

    public function export(string $locale) {
        return $this->repo->export($locale);
    }
}
