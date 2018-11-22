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
$sensor_rawdata_add = new sensor_rawdata_add();

// Run the page
$sensor_rawdata_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$sensor_rawdata_add->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "add";
var fsensor_rawdataadd = currentForm = new ew.Form("fsensor_rawdataadd", "add");

// Validate form
fsensor_rawdataadd.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
	if ($fobj.find("#confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		<?php if ($sensor_rawdata_add->imei->Required) { ?>
			elm = this.getElements("x" + infix + "_imei");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->imei->caption(), $sensor_rawdata->imei->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sensor_rawdata_add->GPS_lat->Required) { ?>
			elm = this.getElements("x" + infix + "_GPS_lat");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->GPS_lat->caption(), $sensor_rawdata->GPS_lat->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GPS_lat");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($sensor_rawdata->GPS_lat->errorMessage()) ?>");
		<?php if ($sensor_rawdata_add->GPS_lon->Required) { ?>
			elm = this.getElements("x" + infix + "_GPS_lon");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->GPS_lon->caption(), $sensor_rawdata->GPS_lon->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_GPS_lon");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($sensor_rawdata->GPS_lon->errorMessage()) ?>");
		<?php if ($sensor_rawdata_add->timezone->Required) { ?>
			elm = this.getElements("x" + infix + "_timezone");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->timezone->caption(), $sensor_rawdata->timezone->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sensor_rawdata_add->sensor_id->Required) { ?>
			elm = this.getElements("x" + infix + "_sensor_id");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->sensor_id->caption(), $sensor_rawdata->sensor_id->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sensor_rawdata_add->sensor_value->Required) { ?>
			elm = this.getElements("x" + infix + "_sensor_value");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->sensor_value->caption(), $sensor_rawdata->sensor_value->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_sensor_value");
			if (elm && !ew.checkNumber(elm.value))
				return this.onError(elm, "<?php echo JsEncode($sensor_rawdata->sensor_value->errorMessage()) ?>");
		<?php if ($sensor_rawdata_add->sensor_unit->Required) { ?>
			elm = this.getElements("x" + infix + "_sensor_unit");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->sensor_unit->caption(), $sensor_rawdata->sensor_unit->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sensor_rawdata_add->date_add->Required) { ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->date_add->caption(), $sensor_rawdata->date_add->RequiredErrorMessage)) ?>");
		<?php } ?>
			elm = this.getElements("x" + infix + "_date_add");
			if (elm && !ew.checkDateDef(elm.value))
				return this.onError(elm, "<?php echo JsEncode($sensor_rawdata->date_add->errorMessage()) ?>");
		<?php if ($sensor_rawdata_add->blockn->Required) { ?>
			elm = this.getElements("x" + infix + "_blockn");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->blockn->caption(), $sensor_rawdata->blockn->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($sensor_rawdata_add->BlockDetail->Required) { ?>
			elm = this.getElements("x" + infix + "_BlockDetail");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $sensor_rawdata->BlockDetail->caption(), $sensor_rawdata->BlockDetail->RequiredErrorMessage)) ?>");
		<?php } ?>

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ew.forms[val])
			if (!ew.forms[val].validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
fsensor_rawdataadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fsensor_rawdataadd.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $sensor_rawdata_add->showPageHeader(); ?>
<?php
$sensor_rawdata_add->showMessage();
?>
<form name="fsensor_rawdataadd" id="fsensor_rawdataadd" class="<?php echo $sensor_rawdata_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($sensor_rawdata_add->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $sensor_rawdata_add->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="sensor_rawdata">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$sensor_rawdata_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($sensor_rawdata->imei->Visible) { // imei ?>
	<div id="r_imei" class="form-group row">
		<label id="elh_sensor_rawdata_imei" for="x_imei" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->imei->caption() ?><?php echo ($sensor_rawdata->imei->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->imei->cellAttributes() ?>>
<span id="el_sensor_rawdata_imei">
<input type="text" data-table="sensor_rawdata" data-field="x_imei" name="x_imei" id="x_imei" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($sensor_rawdata->imei->getPlaceHolder()) ?>" value="<?php echo $sensor_rawdata->imei->EditValue ?>"<?php echo $sensor_rawdata->imei->editAttributes() ?>>
</span>
<?php echo $sensor_rawdata->imei->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lat->Visible) { // GPS_lat ?>
	<div id="r_GPS_lat" class="form-group row">
		<label id="elh_sensor_rawdata_GPS_lat" for="x_GPS_lat" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->GPS_lat->caption() ?><?php echo ($sensor_rawdata->GPS_lat->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->GPS_lat->cellAttributes() ?>>
<span id="el_sensor_rawdata_GPS_lat">
<input type="text" data-table="sensor_rawdata" data-field="x_GPS_lat" name="x_GPS_lat" id="x_GPS_lat" size="30" placeholder="<?php echo HtmlEncode($sensor_rawdata->GPS_lat->getPlaceHolder()) ?>" value="<?php echo $sensor_rawdata->GPS_lat->EditValue ?>"<?php echo $sensor_rawdata->GPS_lat->editAttributes() ?>>
</span>
<?php echo $sensor_rawdata->GPS_lat->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_rawdata->GPS_lon->Visible) { // GPS_lon ?>
	<div id="r_GPS_lon" class="form-group row">
		<label id="elh_sensor_rawdata_GPS_lon" for="x_GPS_lon" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->GPS_lon->caption() ?><?php echo ($sensor_rawdata->GPS_lon->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->GPS_lon->cellAttributes() ?>>
<span id="el_sensor_rawdata_GPS_lon">
<input type="text" data-table="sensor_rawdata" data-field="x_GPS_lon" name="x_GPS_lon" id="x_GPS_lon" size="30" placeholder="<?php echo HtmlEncode($sensor_rawdata->GPS_lon->getPlaceHolder()) ?>" value="<?php echo $sensor_rawdata->GPS_lon->EditValue ?>"<?php echo $sensor_rawdata->GPS_lon->editAttributes() ?>>
</span>
<?php echo $sensor_rawdata->GPS_lon->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_rawdata->timezone->Visible) { // timezone ?>
	<div id="r_timezone" class="form-group row">
		<label id="elh_sensor_rawdata_timezone" for="x_timezone" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->timezone->caption() ?><?php echo ($sensor_rawdata->timezone->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->timezone->cellAttributes() ?>>
<span id="el_sensor_rawdata_timezone">
<input type="text" data-table="sensor_rawdata" data-field="x_timezone" name="x_timezone" id="x_timezone" size="30" maxlength="15" placeholder="<?php echo HtmlEncode($sensor_rawdata->timezone->getPlaceHolder()) ?>" value="<?php echo $sensor_rawdata->timezone->EditValue ?>"<?php echo $sensor_rawdata->timezone->editAttributes() ?>>
</span>
<?php echo $sensor_rawdata->timezone->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_rawdata->sensor_id->Visible) { // sensor_id ?>
	<div id="r_sensor_id" class="form-group row">
		<label id="elh_sensor_rawdata_sensor_id" for="x_sensor_id" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->sensor_id->caption() ?><?php echo ($sensor_rawdata->sensor_id->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->sensor_id->cellAttributes() ?>>
<span id="el_sensor_rawdata_sensor_id">
<input type="text" data-table="sensor_rawdata" data-field="x_sensor_id" name="x_sensor_id" id="x_sensor_id" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($sensor_rawdata->sensor_id->getPlaceHolder()) ?>" value="<?php echo $sensor_rawdata->sensor_id->EditValue ?>"<?php echo $sensor_rawdata->sensor_id->editAttributes() ?>>
</span>
<?php echo $sensor_rawdata->sensor_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_rawdata->sensor_value->Visible) { // sensor_value ?>
	<div id="r_sensor_value" class="form-group row">
		<label id="elh_sensor_rawdata_sensor_value" for="x_sensor_value" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->sensor_value->caption() ?><?php echo ($sensor_rawdata->sensor_value->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->sensor_value->cellAttributes() ?>>
<span id="el_sensor_rawdata_sensor_value">
<input type="text" data-table="sensor_rawdata" data-field="x_sensor_value" name="x_sensor_value" id="x_sensor_value" size="30" placeholder="<?php echo HtmlEncode($sensor_rawdata->sensor_value->getPlaceHolder()) ?>" value="<?php echo $sensor_rawdata->sensor_value->EditValue ?>"<?php echo $sensor_rawdata->sensor_value->editAttributes() ?>>
</span>
<?php echo $sensor_rawdata->sensor_value->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_rawdata->sensor_unit->Visible) { // sensor_unit ?>
	<div id="r_sensor_unit" class="form-group row">
		<label id="elh_sensor_rawdata_sensor_unit" for="x_sensor_unit" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->sensor_unit->caption() ?><?php echo ($sensor_rawdata->sensor_unit->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->sensor_unit->cellAttributes() ?>>
<span id="el_sensor_rawdata_sensor_unit">
<input type="text" data-table="sensor_rawdata" data-field="x_sensor_unit" name="x_sensor_unit" id="x_sensor_unit" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($sensor_rawdata->sensor_unit->getPlaceHolder()) ?>" value="<?php echo $sensor_rawdata->sensor_unit->EditValue ?>"<?php echo $sensor_rawdata->sensor_unit->editAttributes() ?>>
</span>
<?php echo $sensor_rawdata->sensor_unit->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_rawdata->date_add->Visible) { // date_add ?>
	<div id="r_date_add" class="form-group row">
		<label id="elh_sensor_rawdata_date_add" for="x_date_add" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->date_add->caption() ?><?php echo ($sensor_rawdata->date_add->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->date_add->cellAttributes() ?>>
<span id="el_sensor_rawdata_date_add">
<input type="text" data-table="sensor_rawdata" data-field="x_date_add" data-format="1" name="x_date_add" id="x_date_add" placeholder="<?php echo HtmlEncode($sensor_rawdata->date_add->getPlaceHolder()) ?>" value="<?php echo $sensor_rawdata->date_add->EditValue ?>"<?php echo $sensor_rawdata->date_add->editAttributes() ?>>
<?php if (!$sensor_rawdata->date_add->ReadOnly && !$sensor_rawdata->date_add->Disabled && !isset($sensor_rawdata->date_add->EditAttrs["readonly"]) && !isset($sensor_rawdata->date_add->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fsensor_rawdataadd", "x_date_add", {"ignoreReadonly":true,"useCurrent":false,"format":1});
</script>
<?php } ?>
</span>
<?php echo $sensor_rawdata->date_add->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_rawdata->blockn->Visible) { // blockn ?>
	<div id="r_blockn" class="form-group row">
		<label id="elh_sensor_rawdata_blockn" for="x_blockn" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->blockn->caption() ?><?php echo ($sensor_rawdata->blockn->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->blockn->cellAttributes() ?>>
<span id="el_sensor_rawdata_blockn">
<input type="text" data-table="sensor_rawdata" data-field="x_blockn" name="x_blockn" id="x_blockn" size="30" maxlength="30" placeholder="<?php echo HtmlEncode($sensor_rawdata->blockn->getPlaceHolder()) ?>" value="<?php echo $sensor_rawdata->blockn->EditValue ?>"<?php echo $sensor_rawdata->blockn->editAttributes() ?>>
</span>
<?php echo $sensor_rawdata->blockn->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($sensor_rawdata->BlockDetail->Visible) { // BlockDetail ?>
	<div id="r_BlockDetail" class="form-group row">
		<label id="elh_sensor_rawdata_BlockDetail" for="x_BlockDetail" class="<?php echo $sensor_rawdata_add->LeftColumnClass ?>"><?php echo $sensor_rawdata->BlockDetail->caption() ?><?php echo ($sensor_rawdata->BlockDetail->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $sensor_rawdata_add->RightColumnClass ?>"><div<?php echo $sensor_rawdata->BlockDetail->cellAttributes() ?>>
<span id="el_sensor_rawdata_BlockDetail">
<textarea data-table="sensor_rawdata" data-field="x_BlockDetail" name="x_BlockDetail" id="x_BlockDetail" cols="35" rows="4" placeholder="<?php echo HtmlEncode($sensor_rawdata->BlockDetail->getPlaceHolder()) ?>"<?php echo $sensor_rawdata->BlockDetail->editAttributes() ?>><?php echo $sensor_rawdata->BlockDetail->EditValue ?></textarea>
</span>
<?php echo $sensor_rawdata->BlockDetail->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$sensor_rawdata_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $sensor_rawdata_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $sensor_rawdata_add->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$sensor_rawdata_add->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$sensor_rawdata_add->terminate();
?>
