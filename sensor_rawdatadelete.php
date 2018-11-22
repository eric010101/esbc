<?php
namespace PHPMaker2019\esbc_clientALL_20181122;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start(); 

// Autoload
include_once "autoload.php";
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$sensor_rawdata_delete = new sensor_rawdata_delete();

// Run the page
$sensor_rawdata_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sensor_rawdata_delete->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "delete";
var fsensor_rawdatadelete = currentForm = new ew.Form("fsensor_rawdatadelete", "delete");

// Form_CustomValidate event
fsensor_rawdatadelete.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsensor_rawdatadelete.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sensor_rawdata_delete->showPageHeader(); ?>
<?php
$sensor_rawdata_delete->showMessage();
?>
<form name="fsensor_rawdatadelete" id="fsensor_rawdatadelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sensor_rawdata_delete->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sensor_rawdata_delete->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sensor_rawdata">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($sensor_rawdata_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode($COMPOSITE_KEY_SEPARATOR, $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php if (IsResponsiveLayout()) { ?>table-responsive <?php } ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($sensor_rawdata->RTLindex->Visible) { // RTLindex ?>
		<th class="<?php echo $sensor_rawdata->RTLindex->headerCellClass() ?>"><span id="elh_sensor_rawdata_RTLindex" class="sensor_rawdata_RTLindex"><?php echo $sensor_rawdata->RTLindex->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_rawdata->imei->Visible) { // imei ?>
		<th class="<?php echo $sensor_rawdata->imei->headerCellClass() ?>"><span id="elh_sensor_rawdata_imei" class="sensor_rawdata_imei"><?php echo $sensor_rawdata->imei->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lat->Visible) { // GPS_lat ?>
		<th class="<?php echo $sensor_rawdata->GPS_lat->headerCellClass() ?>"><span id="elh_sensor_rawdata_GPS_lat" class="sensor_rawdata_GPS_lat"><?php echo $sensor_rawdata->GPS_lat->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lon->Visible) { // GPS_lon ?>
		<th class="<?php echo $sensor_rawdata->GPS_lon->headerCellClass() ?>"><span id="elh_sensor_rawdata_GPS_lon" class="sensor_rawdata_GPS_lon"><?php echo $sensor_rawdata->GPS_lon->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_rawdata->timezone->Visible) { // timezone ?>
		<th class="<?php echo $sensor_rawdata->timezone->headerCellClass() ?>"><span id="elh_sensor_rawdata_timezone" class="sensor_rawdata_timezone"><?php echo $sensor_rawdata->timezone->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_rawdata->sensor_id->Visible) { // sensor_id ?>
		<th class="<?php echo $sensor_rawdata->sensor_id->headerCellClass() ?>"><span id="elh_sensor_rawdata_sensor_id" class="sensor_rawdata_sensor_id"><?php echo $sensor_rawdata->sensor_id->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_rawdata->sensor_value->Visible) { // sensor_value ?>
		<th class="<?php echo $sensor_rawdata->sensor_value->headerCellClass() ?>"><span id="elh_sensor_rawdata_sensor_value" class="sensor_rawdata_sensor_value"><?php echo $sensor_rawdata->sensor_value->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_rawdata->sensor_unit->Visible) { // sensor_unit ?>
		<th class="<?php echo $sensor_rawdata->sensor_unit->headerCellClass() ?>"><span id="elh_sensor_rawdata_sensor_unit" class="sensor_rawdata_sensor_unit"><?php echo $sensor_rawdata->sensor_unit->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_rawdata->date_add->Visible) { // date_add ?>
		<th class="<?php echo $sensor_rawdata->date_add->headerCellClass() ?>"><span id="elh_sensor_rawdata_date_add" class="sensor_rawdata_date_add"><?php echo $sensor_rawdata->date_add->caption() ?></span></th>
<?php } ?>
<?php if ($sensor_rawdata->blockn->Visible) { // blockn ?>
		<th class="<?php echo $sensor_rawdata->blockn->headerCellClass() ?>"><span id="elh_sensor_rawdata_blockn" class="sensor_rawdata_blockn"><?php echo $sensor_rawdata->blockn->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$sensor_rawdata_delete->RecCnt = 0;
$i = 0;
while (!$sensor_rawdata_delete->Recordset->EOF) {
	$sensor_rawdata_delete->RecCnt++;
	$sensor_rawdata_delete->RowCnt++;

	// Set row properties
	$sensor_rawdata->resetAttributes();
	$sensor_rawdata->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$sensor_rawdata_delete->loadRowValues($sensor_rawdata_delete->Recordset);

	// Render row
	$sensor_rawdata_delete->renderRow();
?>
	<tr<?php echo $sensor_rawdata->rowAttributes() ?>>
<?php if ($sensor_rawdata->RTLindex->Visible) { // RTLindex ?>
		<td<?php echo $sensor_rawdata->RTLindex->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_RTLindex" class="sensor_rawdata_RTLindex">
<span<?php echo $sensor_rawdata->RTLindex->viewAttributes() ?>>
<?php echo $sensor_rawdata->RTLindex->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_rawdata->imei->Visible) { // imei ?>
		<td<?php echo $sensor_rawdata->imei->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_imei" class="sensor_rawdata_imei">
<span<?php echo $sensor_rawdata->imei->viewAttributes() ?>>
<?php echo $sensor_rawdata->imei->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lat->Visible) { // GPS_lat ?>
		<td<?php echo $sensor_rawdata->GPS_lat->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_GPS_lat" class="sensor_rawdata_GPS_lat">
<span<?php echo $sensor_rawdata->GPS_lat->viewAttributes() ?>>
<?php echo $sensor_rawdata->GPS_lat->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lon->Visible) { // GPS_lon ?>
		<td<?php echo $sensor_rawdata->GPS_lon->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_GPS_lon" class="sensor_rawdata_GPS_lon">
<span<?php echo $sensor_rawdata->GPS_lon->viewAttributes() ?>>
<?php echo $sensor_rawdata->GPS_lon->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_rawdata->timezone->Visible) { // timezone ?>
		<td<?php echo $sensor_rawdata->timezone->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_timezone" class="sensor_rawdata_timezone">
<span<?php echo $sensor_rawdata->timezone->viewAttributes() ?>>
<?php echo $sensor_rawdata->timezone->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_rawdata->sensor_id->Visible) { // sensor_id ?>
		<td<?php echo $sensor_rawdata->sensor_id->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_sensor_id" class="sensor_rawdata_sensor_id">
<span<?php echo $sensor_rawdata->sensor_id->viewAttributes() ?>>
<?php echo $sensor_rawdata->sensor_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_rawdata->sensor_value->Visible) { // sensor_value ?>
		<td<?php echo $sensor_rawdata->sensor_value->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_sensor_value" class="sensor_rawdata_sensor_value">
<span<?php echo $sensor_rawdata->sensor_value->viewAttributes() ?>>
<?php echo $sensor_rawdata->sensor_value->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_rawdata->sensor_unit->Visible) { // sensor_unit ?>
		<td<?php echo $sensor_rawdata->sensor_unit->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_sensor_unit" class="sensor_rawdata_sensor_unit">
<span<?php echo $sensor_rawdata->sensor_unit->viewAttributes() ?>>
<?php echo $sensor_rawdata->sensor_unit->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_rawdata->date_add->Visible) { // date_add ?>
		<td<?php echo $sensor_rawdata->date_add->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_date_add" class="sensor_rawdata_date_add">
<span<?php echo $sensor_rawdata->date_add->viewAttributes() ?>>
<?php echo $sensor_rawdata->date_add->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($sensor_rawdata->blockn->Visible) { // blockn ?>
		<td<?php echo $sensor_rawdata->blockn->cellAttributes() ?>>
<span id="el<?php echo $sensor_rawdata_delete->RowCnt ?>_sensor_rawdata_blockn" class="sensor_rawdata_blockn">
<span<?php echo $sensor_rawdata->blockn->viewAttributes() ?>>
<?php echo $sensor_rawdata->blockn->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$sensor_rawdata_delete->Recordset->moveNext();
}
$sensor_rawdata_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sensor_rawdata_delete->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$sensor_rawdata_delete->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sensor_rawdata_delete->terminate();
?>
