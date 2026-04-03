<?php
$this->load->model('Langs');
$langCode = (string) ($this->session->userdata('lang') ?: 'es');
$langMeta = $this->Langs->getLanguageMeta($langCode);
$paymentTitle = $this->Langs->getText('payment_fail_title', $langCode, 'Transaction Failed');
$paymentDetails = $this->Langs->getText('payment_transaction_details', $langCode, 'Transaction Details');
$paymentMessage = $this->Langs->getText('payment_fail_message', $langCode, 'Sorry, your latest transaction was cancelled.');
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
       <p><?php echo html_escape($paymentMessage); ?></p>
    </div>
  </div>
</body>
</html>
