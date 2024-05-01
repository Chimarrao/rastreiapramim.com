<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrackingLog;

class EncomendaController extends Controller
{
    public function buscarEncomenda(Request $request)
    {
        $codigo = $request->codigo;
        $user = 'teste';
        $token = '1abcd00b2731640e886fb41a8a9671ad1434c599dbaa0a0de9a5aa619f29a83f';
        $data = false;
        $count = 0;

        while (!$data) {
            if (++$count == 40) {
                break;
            }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, "https://api.linketrack.com/track/json?user={$user}&token={$token}&codigo={$codigo}");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $response = curl_exec($ch);

            if (curl_errno($ch)) {
                curl_close($ch);
                return back()->withErrors('Erro ao buscar informações da encomenda: ' . curl_error($ch));
            }

            curl_close($ch);

            $data = json_decode($response, true);
        
            if ($data) {
                $eventos = $data['eventos'] ?? [];
                $resultado = collect($eventos)->map(function ($evento) {
                    $icon = $this->getIconByStatus($evento['status']);
                    return [
                        'icone' => $icon,
                        'data' => $evento['data'],
                        'hora' => $evento['hora'],
                        'status' => $evento['status'],
                        'subStatus1' => $evento['subStatus'][0] ?? '',
                        'subStatus2' => $evento['subStatus'][1] ?? ''
                    ];
                });

                TrackingLog::create([
                    'codigo' => $codigo,
                    'resultado' => $resultado
                ]);
    
                return response()->json(['resultado' => $resultado]);
            }
        }

        return response()->json(['erro' => 'Sistema fora do ar ou código incorreto']);
    }

    private function getIconByStatus($status)
    {
        return match (true) {
            str_contains($status, 'Objeto entregue ao destinatário') => asset('images/received.png'),
            str_contains($status, 'Objeto saiu para entrega ao destinatário') => asset('images/delivery.png'),
            str_contains($status, 'Objeto encaminhado') => asset('images/fast-delivery.png'),
            str_contains($status, 'Objeto postado') => asset('images/parcel.png'),
            str_contains($status, 'Objeto recebido pelos Correios') => asset('images/giving.png'),
            str_contains($status, 'Encaminhado para fiscalização aduaneira') || str_contains($status, 'Informações eletrônicas enviadas para análise da autoridade aduaneira') => asset('images/checking.png'),
            str_contains($status, 'Fiscalização aduaneira finalizada') || str_contains($status, 'Análise concluída - importação autorizada') => asset('images/checking_finished.png'),
            str_contains($status, 'Aguardando pagamento') => asset('images/bill.png'),
            str_contains($status, 'Pagamento confirmado') => asset('images/receipt.png'),
            str_contains($status, 'Objeto recebido na unidade de exportação no país de origem') => asset('images/export.png'),
            str_contains($status, 'A importação do objeto/conteúdo não foi autorizada pelos órgãos fiscalizadores') => asset('images/not_authorized.png'),
            str_contains($status, 'Objeto devolvido ao país de origem') => asset('images/returned.png'),
            str_contains($status, 'Saída do Centro Internacional') => asset('images/international-exit.png'),
            str_contains($status, 'Análise concluída - importação não autorizada') => asset('images/checking_finished_error.png'),
            default => asset('images/mystery.png'),
        };
    }
}
