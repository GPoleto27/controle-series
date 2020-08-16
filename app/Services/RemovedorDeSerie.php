<?php

namespace App\Services;

use App\{Serie, Temporada, Episodio};
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class RemovedorDeSerie
{
    private function removerTemporadas(Serie $serie)
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodios(Temporada $temporada)
    {
        $temporada->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }

    public function removerSerie(int $id): string
    {
        DB::beginTransaction();
        $serie = Serie::find($id);
        $nome = $serie->nome;
        $this->removerTemporadas($serie);
        $serie->delete();
        DB::commit();

        return $nome;
    }
}
