<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    private function criarEpisodios($temporada, $epPorTemporada)
    {
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }

    private function criarTemporadas($serie, $qtdTemporadas, $epPorTemporada)
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);
            $this->criarEpisodios($temporada, $epPorTemporada);
        }
    }

    public function criarSerie(
        string $nome,
        int $qtdTemporadas,
        int $epPorTemporada
    ): Serie {
        $serie = new Serie();

        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nome]);
        $this->criarTemporadas($serie, $qtdTemporadas, $epPorTemporada);
        DB::commit();

        return $serie;
    }
}
