<?php
//$fiservLog = $app->extern($ORM_TRANSACT . "transact/log.php");
class persistTransaction
{
    private static $responseCode;
    private static $acquirer;
    private static $acquirerTerminal;
    private static $additionalData;
    private static $authorizationCode;
    private static $batch;
    private static $cardAccountType;
    private static $cardNumber;
    private static $cardOwnerName;
    private static $ci;
    private static $currency;
    private static $emvApplicationId;
    private static $emvApplicationName;
    private static $expirationDate;
    private static $inputMode;
    private static $invalidCardBinRead;
    private static $invalidCardIssuerRead;
    private static $invoiceNumber;
    private static $issuer;
    private static $merchant;
    private static $monthsDeferred;
    private static $originCardType;
    private static $originalTicket;
    private static $posSignature;
    private static $plan;
    private static $posID;
    private static $posResponseCode;
    private static $posResponseCodeExtension;
    private static $privateUse1;
    private static $quota;
    private static $remainingExpirationTime;
    private static $showTextInCashBoxScreen;
    private static $specialData;
    private static $taxAmount;
    private static $taxRefund;
    private static $ticket;
    private static $tipAmount;
    private static $totalAmount;
    private static $transactionDate;
    private static $transactionHour;
    private static $transactionType;
    private static $voucherPrintInfo;

    public static function saveTransaction($dataResponse)
    {

        return $data = [
            self::$responseCode = $dataResponse->ResponseCode,
            self::$acquirer = $dataResponse->Acquirer,
            self::$acquirerTerminal = $dataResponse->AcquirerTerminal,
            self::$additionalData = $dataResponse->AdditionalData,
            self::$authorizationCode = $dataResponse->AuthorizationCode,
            self::$batch = $dataResponse->Batch,
            self::$cardAccountType = $dataResponse->CardAccountType,
            self::$cardNumber = $dataResponse->CardNumber,
            self::$cardOwnerName = $dataResponse->CardOwnerName,
            self::$ci = $dataResponse->Ci,
            self::$currency = $dataResponse->Currency,
            self::$emvApplicationId = $dataResponse->EmvApplicationId,
            self::$emvApplicationName = $dataResponse->EmvApplicationName,
            self::$expirationDate = $dataResponse->ExpirationDate,
            self::$inputMode = $dataResponse->InputMode,
            self::$invalidCardBinRead = $dataResponse->InvalidCardBinRead,
            self::$invalidCardIssuerRead = $dataResponse->InvalidCardIssuerRead,
            self::$invoiceNumber = $dataResponse->InvoiceNumber,
            self::$issuer = $dataResponse->Issuer,
            self::$merchant = $dataResponse->Merchant,
            self::$monthsDeferred = $dataResponse->MonthsDeferred,
            self::$originCardType = $dataResponse->OriginCardType,
            self::$originalTicket = $dataResponse->OriginalTicket,
            self::$posSignature = $dataResponse->POSSignature,
            self::$plan = $dataResponse->Plan,
            self::$posID = $dataResponse->PosID,
            self::$posResponseCode = $dataResponse->PosResponseCode,
            self::$posResponseCodeExtension = $dataResponse->PosResponseCodeExtension,
            self::$privateUse1 = $dataResponse->PrivateUse1,
            self::$quota = $dataResponse->Quota,
            self::$remainingExpirationTime = $dataResponse->RemainingExpirationTime,
            self::$showTextInCashBoxScreen = $dataResponse->ShowTextInCashBoxScreen,
            self::$specialData = $dataResponse->SpecialData,
            self::$taxAmount = $dataResponse->TaxAmount,
            self::$taxRefund = $dataResponse->TaxRefund,
            self::$ticket = $dataResponse->Ticket,
            self::$tipAmount = $dataResponse->TipAmount,
            self::$totalAmount = $dataResponse->TotalAmount,
            self::$transactionDate = $dataResponse->TransactionDate,
            self::$transactionHour = $dataResponse->TransactionHour,
            self::$transactionType = $dataResponse->TransactionType,
            self::$voucherPrintInfo = $dataResponse->VoucherPrintInfo,

        ];
    }
}
