<?php

namespace App\Services;

use App\{Episodio, Serie, Temporada};
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{

    public function removerSerie(int $serieId): string
    {
        $nomeSerie = '';
        DB::transaction(
            function () use (&$nomeSerie, $serieId) {
                $serie = Serie::find($serieId);
                $nomeSerie = $serie->nome;
                $this->removerTemporadas($serie);
                $serie->delete();
            }
        );
        return $nomeSerie;
    }

    private function removerTemporadas($serie): void
    {
        $serie->temporadas()->each(function (Temporada $temporadas) {
            $this->removerEpisodios($temporadas);
            $temporadas->delete();
        });
    }

    private function removerEpisodios(Temporada $temporadas): void
    {
        $temporadas->episodios()->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
