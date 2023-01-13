<?php use kartik\date\DatePicker;
?>
<br>
<br>
<br>
<br>
<br>
<br>

<?php
// usage without model
echo '<label>Check Issue Date</label>';
echo DatePicker::widget([
'name' => 'data',
'value' => date('d-M-Y', strtotime('+2 days')),
'options' => ['placeholder' => 'Select issue date ...'],
'pluginOptions' => [
'format' => 'dd-M-yyyy',
'todayHighlight' => true
]
]);
?>