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
$esbc_geth_par_edit = new esbc_geth_par_edit();

// Run the page
$esbc_geth_par_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$esbc_geth_par_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script>

// Form object
currentPageID = ew.PAGE_ID = "edit";
var fesbc_geth_paredit = currentForm = new ew.Form("fesbc_geth_paredit", "edit");

// Validate form
fesbc_geth_paredit.validate = function() {
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
		<?php if ($esbc_geth_par_edit->GETH_INDEX->Required) { ?>
			elm = this.getElements("x" + infix + "_GETH_INDEX");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_geth_par->GETH_INDEX->caption(), $esbc_geth_par->GETH_INDEX->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_geth_par_edit->HOST_TYPE->Required) { ?>
			elm = this.getElements("x" + infix + "_HOST_TYPE");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_geth_par->HOST_TYPE->caption(), $esbc_geth_par->HOST_TYPE->RequiredErrorMessage)) ?>");
		<?php } ?>
		<?php if ($esbc_geth_par_edit->GETH_PATH->Required) { ?>
			elm = this.getElements("x" + infix + "_GETH_PATH");
			if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
				return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $esbc_geth_par->GETH_PATH->caption(), $esbc_geth_par->GETH_PATH->RequiredErrorMessage)) ?>");
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
fesbc_geth_paredit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}

// Use JavaScript validation or not
fesbc_geth_paredit.validateRequired = <?php echo json_encode(CLIENT_VALIDATE) ?>;

// Dynamic selection lists
// Form object for search

</script>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php $esbc_geth_par_edit->showPageHeader(); ?>
<?php
$esbc_geth_par_edit->showMessage();
?>
<form name="fesbc_geth_paredit" id="fesbc_geth_paredit" class="<?php echo $esbc_geth_par_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($esbc_geth_par_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo TOKEN_NAME ?>" value="<?php echo $esbc_geth_par_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="esbc_geth_par">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$esbc_geth_par_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($esbc_geth_par->GETH_INDEX->Visible) { // GETH_INDEX ?>
	<div id="r_GETH_INDEX" class="form-group row">
		<label id="elh_esbc_geth_par_GETH_INDEX" class="<?php echo $esbc_geth_par_edit->LeftColumnClass ?>"><?php echo $esbc_geth_par->GETH_INDEX->caption() ?><?php echo ($esbc_geth_par->GETH_INDEX->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_geth_par_edit->RightColumnClass ?>"><div<?php echo $esbc_geth_par->GETH_INDEX->cellAttributes() ?>>
<span id="el_esbc_geth_par_GETH_INDEX">
<span<?php echo $esbc_geth_par->GETH_INDEX->viewAttributes() ?>>
<input type="text" readonly class="form-control-plaintext" value="<?php echo RemoveHtml($esbc_geth_par->GETH_INDEX->EditValue) ?>"></span>
</span>
<input type="hidden" data-table="esbc_geth_par" data-field="x_GETH_INDEX" name="x_GETH_INDEX" id="x_GETH_INDEX" value="<?php echo HtmlEncode($esbc_geth_par->GETH_INDEX->CurrentValue) ?>">
<?php echo $esbc_geth_par->GETH_INDEX->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_geth_par->HOST_TYPE->Visible) { // HOST_TYPE ?>
	<div id="r_HOST_TYPE" class="form-group row">
		<label id="elh_esbc_geth_par_HOST_TYPE" for="x_HOST_TYPE" class="<?php echo $esbc_geth_par_edit->LeftColumnClass ?>"><?php echo $esbc_geth_par->HOST_TYPE->caption() ?><?php echo ($esbc_geth_par->HOST_TYPE->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_geth_par_edit->RightColumnClass ?>"><div<?php echo $esbc_geth_par->HOST_TYPE->cellAttributes() ?>>
<span id="el_esbc_geth_par_HOST_TYPE">
<input type="text" data-table="esbc_geth_par" data-field="x_HOST_TYPE" name="x_HOST_TYPE" id="x_HOST_TYPE" size="30" maxlength="10" placeholder="<?php echo HtmlEncode($esbc_geth_par->HOST_TYPE->getPlaceHolder()) ?>" value="<?php echo $esbc_geth_par->HOST_TYPE->EditValue ?>"<?php echo $esbc_geth_par->HOST_TYPE->editAttributes() ?>>
</span>
<?php echo $esbc_geth_par->HOST_TYPE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($esbc_geth_par->GETH_PATH->Visible) { // GETH_PATH ?>
	<div id="r_GETH_PATH" class="form-group row">
		<label id="elh_esbc_geth_par_GETH_PATH" for="x_GETH_PATH" class="<?php echo $esbc_geth_par_edit->LeftColumnClass ?>"><?php echo $esbc_geth_par->GETH_PATH->caption() ?><?php echo ($esbc_geth_par->GETH_PATH->Required) ? $Language->Phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $esbc_geth_par_edit->RightColumnClass ?>"><div<?php echo $esbc_geth_par->GETH_PATH->cellAttributes() ?>>
<span id="el_esbc_geth_par_GETH_PATH">
<input type="text" data-table="esbc_geth_par" data-field="x_GETH_PATH" name="x_GETH_PATH" id="x_GETH_PATH" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($esbc_geth_par->GETH_PATH->getPlaceHolder()) ?>" value="<?php echo $esbc_geth_par->GETH_PATH->EditValue ?>"<?php echo $esbc_geth_par->GETH_PATH->editAttributes() ?>>
</span>
<?php echo $esbc_geth_par->GETH_PATH->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$esbc_geth_par_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $esbc_geth_par_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $esbc_geth_par_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$esbc_geth_par_edit->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<script>

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$esbc_geth_par_edit->terminate();
?>
