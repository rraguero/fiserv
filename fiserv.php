<?php
require 'restClient.php';
require 'responseMessages.php';
require 'persistTransaction.php';
require 'helpers.php';

class fiserv extends persistTransaction
{
    private $env;
    private $apiClient;
    private $responseMessages;
    
    public function __construct()
    {
        $this->env = require 'env.php';
        $this->apiClient = new restClient();
        $this->responseMessages = new responseMessages();
    }

    public function processFinancialPurchase($amount, $currency = "858", $userId = "")
    {
        $end_point = $this->env['END_POINTS']->processFinancialPurchase;
        $amount = Helpers::amountFormat($amount);
        $data = array(
            "PosID" => $this->env['POST_ID'],
            "SystemId" => $this->env['SYSTEM_ID'],
            "Branch" => "Geocom",
            "ClientAppId" => "Pruebas",
            "UserId" => $userId,
            "TransactionDateTimeyyyyMMddHHmmssSSS" => date("YmdHisu"),
            "Amount" => $amount,
            "Quotas" => 1,
            "Plan" => 0,
            "Currency" => $currency,
            "TaxRefund" => 1,
            "TaxableAmount" => "10000",
            "InvoiceAmount" => $amount,
            "Merchant" => "",
            "InvoiceNumber" => "11111111",
            "NeedToReadCard" => false,
            "TransactionTimeout" => $this->env['TRANSACTION_TIME_OUT'],
        );

        if (json_decode($this->apiClient->postRequest($data, $end_point, $this->env['URL']))->ResponseCode) {
            return json_encode(($this->responseMessages->handleMessages(json_decode($this->apiClient->postRequest($data, $end_point, $this->env['URL']))->ResponseCode)));
        }
        return ($this->apiClient->postRequest($data, $end_point, $this->env['URL']));
    }

    public function processFinancialPurchaseQuery($financialPurchaseResponse, $userId = '')
    {
        $STransactionId = (string) $financialPurchaseResponse->TransactionId;
        $end_point = $this->env['END_POINTS']->processFinancialPurchaseQuery;
        $data = array(
            "PosID" => $this->env['POST_ID'],
            "SystemId" => $this->env['SYSTEM_ID'],
            "Branch" => "Geocom",
            "ClientAppId" => "Pruebas",
            "UserId" => $userId,
            "TransactionDateTimeyyyyMMddHHmmssSSS" => date("YmdHisu"),
            "TransactionId" => $STransactionId,
            "STransactionId" => $STransactionId,
        );

        if (!json_decode($this->apiClient->postRequest($data, $end_point, $this->env['URL']))->ResponseCode) {
            return json_encode($this->responseMessages->handleMessages($financialPurchaseResponse->ResponseCode));
        }
        return ($this->apiClient->postRequest($data, $end_point, $this->env['URL']));
    }

    public function execute($amount)
    {
        $responseCode = null;
        $financialPurchaseResponse = json_decode($this->processFinancialPurchase($amount));

        if (!$financialPurchaseResponse->code) {
            $financialPurchaseQueryResponse = json_decode($this->processFinancialPurchaseQuery($financialPurchaseResponse));
            do {
                sleep(5);
                $financialPurchaseQueryResponse = json_decode($this->processFinancialPurchaseQuery($financialPurchaseResponse));
                $responseCode = $financialPurchaseQueryResponse->ResponseCode;
            } while ($responseCode == 10 || $responseCode == 12);
            return persistTransaction::saveTransaction($financialPurchaseQueryResponse);
        } else {
            return ($this->responseMessages->handleMessages($financialPurchaseResponse->code));
        }
        return $responseCode;
    }
}
$fiserv = new fiserv();
var_dump($fiserv->execute('1256'));
