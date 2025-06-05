<!DOCTYPE html>
<html>
<head>
  <title>Transaccion Satisfactoria</title>
</head>
<body>
  <div class="container">
    <h2 class="mt-3 mb-3">Detalles de la Transaccion</h2>
    <div class="row">
          <span>Su pago se a procesado correctamente. Gracias por su Compra.</span><br/>
          <span>Numero Item: 
              <strong><?php echo $item_number; ?></strong>
          </span><br/>
          <span>TXN ID : 
              <strong><?php echo $txn_id; ?></strong>
          </span><br/>
          <span>Total Pagado : 
              <strong>$<?php echo $payment_amt.' '.$currency_code; ?></strong>
          </span><br/>
          <span>Estado del Pago : 
              <strong><?php echo $status; ?></strong>
        </span><br/>
    </div>
  </div>
</body>
</html>