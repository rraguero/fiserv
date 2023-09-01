<?php
class responseMessages
{
    public function __construct()
    {

    }
    private $responseCodes = [
        0 => 'OK',
        100 => 'Numero de pinpad invalido',
        101 => 'Número de sucursal inválido',
        102 => 'Número de caja inválido',
        103 => 'Fecha de la transacción inválida',
        104 => 'Monto no válido',
        105 => 'Cantidad de cuotas inválidas',
        106 => 'Número de plan inválido',
        107 => 'Número de factura inválido',
        108 => 'Moneda ingresada no válida',
        109 => 'Número de ticket inválido.',
        110 => 'No existe transacción.',
        111 => 'Transacción finalizada.',
        112 => 'Identificador de sistema inválido.',
        113 => 'Se debe consultar por la transacción',
        10 => 'Aguardando por operación en el pinpad.',
        11 => 'Tiempo de transacción excedido, envíe datos nuevamente.',
        12 => 'Pinpad consultó datos (se pasó la tarjeta).',
        999 => 'Error no determinado',

    ];

    public function getResponseMessages($responseCode)
    {
        return $this->responseCodes[$responseCode] ?? 'Código de respuesta no reconocido';
    }

    public function handleMessages($responseCode)
    {
       
        $responseMessages = $this->getResponseMessages($responseCode);
        
        return [
            'code' => $responseCode,
            'responseCode' => $responseMessages,
        ];
    }
}
