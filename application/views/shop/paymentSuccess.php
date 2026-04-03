<?php
$this->load->model('Langs');
$langCode = (string) ($this->session->userdata('lang') ?: 'es');
$langMeta = $this->Langs->getLanguageMeta($langCode);
$paymentTitle = $this->Langs->getText('payment_success_title', $langCode, 'Successful Transaction');
$paymentDetails = $this->Langs->getText('payment_transaction_details', $langCode, 'Transaction Details');
$paymentMessage = $this->Langs->getText('payment_success_message', $langCode, 'Your payment has been processed successfully. Thank you for your purchase.');
$paymentItem = $this->Langs->getText('payment_item_number', $langCode, 'Item Number');
$paymentTxn = $this->Langs->getText('payment_txn_id', $langCode, 'TXN ID');
$paymentTotal = $this->Langs->getText('payment_total_paid', $langCode, 'Total Paid');
$paymentStatus = $this->Langs->getText('payment_status_label', $langCode, 'Payment Status');
?>
<!DOCTYPE html>
<html lang="<?php echo html_escape($langMeta['code']); ?>" dir="<?php echo html_escape($langMeta['direction']); ?>">
<head>
  <title><?php echo html_escape($paymentTitle); ?></title>
</head>
<body>
  <div class="container">
    <h2 class="mt-3 mb-3"><?php echo html_escape($paymentDetails); ?></h2>
    <div class="row">
          <span><?php echo html_escape($paymentMessage); ?></span><br/>
          <span><?php echo html_escape($paymentItem); ?>:
              <strong><?php echo $item_number; ?></strong>
          </span><br/>
          <span><?php echo html_escape($paymentTxn); ?>:
              <strong><?php echo $txn_id; ?></strong>
          </span><br/>
          <span><?php echo html_escape($paymentTotal); ?>:
              <strong>$<?php echo $payment_amt.' '.$currency_code; ?></strong>
          </span><br/>
          <span><?php echo html_escape($paymentStatus); ?>:
              <strong><?php echo $status; ?></strong>
        </span><br/>
    </div>
  </div>
</body>
</html>
