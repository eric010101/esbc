<?php
namespace PHPMaker2019\esbc_clientALL_20181122;

//
// Page class
//
class sensor_rawdata_add extends sensor_rawdata
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{04503673-A70B-421F-8E02-1DFE5D0B56A3}";

	// Table name
	public $TableName = 'sensor_rawdata';

	// Page object name
	public $PageObjName = "sensor_rawdata_add";

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken = CHECK_TOKEN;
	public $CheckTokenFn = PROJECT_NAMESPACE . "CheckToken";
	public $CreateTokenFn = PROJECT_NAMESPACE . "CreateToken";

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading <> "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading <> "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->Phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Message
	public function getMessage()
	{
		return @$_SESSION[SESSION_MESSAGE];
	}
	public function setMessage($v)
	{
		AddMessage($_SESSION[SESSION_MESSAGE], $v);
	}
	public function getFailureMessage()
	{
		return @$_SESSION[SESSION_FAILURE_MESSAGE];
	}
	public function setFailureMessage($v)
	{
		AddMessage($_SESSION[SESSION_FAILURE_MESSAGE], $v);
	}
	public function getSuccessMessage()
	{
		return @$_SESSION[SESSION_SUCCESS_MESSAGE];
	}
	public function setSuccessMessage($v)
	{
		AddMessage($_SESSION[SESSION_SUCCESS_MESSAGE], $v);
	}
	public function getWarningMessage()
	{
		return @$_SESSION[SESSION_WARNING_MESSAGE];
	}
	public function setWarningMessage($v)
	{
		AddMessage($_SESSION[SESSION_WARNING_MESSAGE], $v);
	}

	// Methods to clear message
	public function clearMessage()
	{
		$_SESSION[SESSION_MESSAGE] = "";
	}
	public function clearFailureMessage()
	{
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}
	public function clearSuccessMessage()
	{
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}
	public function clearWarningMessage()
	{
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}
	public function clearMessages()
	{
		$_SESSION[SESSION_MESSAGE] = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Show message
	public function showMessage()
	{
		$hidden = FALSE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message <> "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fa fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fa fa-warning"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage <> "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fa fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fa fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessageAsArray()
	{
		$ar = array();

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message <> "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage <> "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage <> "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage <> "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header <> "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer <> "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") <> "")
				return ($this->TableVar == Get("t"));
		} else {
			return TRUE;
		}
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(TOKEN_NAME) === NULL)
			return FALSE;
		$fn = $this->CheckTokenFn;
		if (is_callable($fn))
			return $fn(Post(TOKEN_NAME), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;

		//if ($this->CheckToken) { // Always create token, required by API file/lookup request
			$fn = $this->CreateTokenFn;
			if ($this->Token == "" && is_callable($fn)) // Create token
				$this->Token = $fn();
			$CurrentToken = $this->Token; // Save to global variable

		//}
	}

	//
	// Page class constructor
	//

	public function __construct()
	{
		global $Conn, $Language, $COMPOSITE_KEY_SEPARATOR;
		global $UserTable, $UserTableConn;

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (sensor_rawdata)
		if (!isset($GLOBALS["sensor_rawdata"]) || get_class($GLOBALS["sensor_rawdata"]) == PROJECT_NAMESPACE . "sensor_rawdata") {
			$GLOBALS["sensor_rawdata"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["sensor_rawdata"];
		}

		// Table object (esbc_user)
		if (!isset($GLOBALS['esbc_user'])) $GLOBALS['esbc_user'] = new esbc_user();

		// Page ID
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'sensor_rawdata');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($Conn))
			$Conn = GetConnection($this->Dbid);

		// User table object (esbc_user)
		if (!isset($UserTable)) {
			$UserTable = new esbc_user();
			$UserTableConn = Conn($UserTable->Dbid);
		}
	}

	//
	// Terminate page
	//

	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EXPORT, $sensor_rawdata;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EXPORT)) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . $EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($sensor_rawdata);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessageAsArray()));
			exit();
		}

		// Go to URL if specified
		if ($url <> "") {
			if (!DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = array("url" => $url, "modal" => "1");
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "sensor_rawdataview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson([$row]);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = array();
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = array();
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {

								//$url = FullUrl($fld->TableVar . "/" . API_FILE_ACTION . "/" . $fld->Param . "/" . rawurlencode($this->getRecordKeyValue($ar))); // URL rewrite format
								$url = FullUrl(GetPageName(API_URL) . "?" . API_OBJECT_NAME . "=" . $fld->TableVar . "&" . API_ACTION_NAME . "=" . API_FILE_ACTION . "&" . API_FIELD_NAME . "=" . $fld->Param . "&" . API_KEY_NAME . "=" . rawurlencode($this->getRecordKeyValue($ar))); // Query string format
								$row[$fldname] = ["mimeType" => ContentType(substr($val, 0, 11)), "url" => $url];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, MULTIPLE_UPLOAD_SEPARATOR)) { // Single file
								$row[$fldname] = ["mimeType" => ContentType("", $val), "url" => FullUrl($fld->hrefPath() . $val)];
							} else { // Multiple files
								$files = explode(MULTIPLE_UPLOAD_SEPARATOR, $val);
								$ar = [];
								foreach ($files as $file) {
									if (!EmptyValue($file))
										$ar[] = ["type" => ContentType("", $val), "url" => FullUrl($fld->hrefPath() . $file)];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		global $COMPOSITE_KEY_SEPARATOR;
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['RTLindex'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->RTLindex->Visible = FALSE;
	}
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRec;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $RequestSecurity, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Init Session data for API request if token found
		if (IsApi() && session_status() !== PHP_SESSION_ACTIVE) {
			$func = PROJECT_NAMESPACE . "CheckToken";
			if (is_callable($func) && Param(TOKEN_NAME) !== NULL && $func(Param(TOKEN_NAME), SessionTimeoutTime()))
				session_start();
		}

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		$Security = new AdvancedSecurity();
		$validRequest = FALSE;

		// Check security for API request
		If (IsApi()) {

			// Check token first
			$func = PROJECT_NAMESPACE . "CheckToken";
			if (is_callable($func) && Post(TOKEN_NAME) !== NULL)
				$validRequest = $func(Post(TOKEN_NAME), SessionTimeoutTime());
			elseif (is_array($RequestSecurity) && @$RequestSecurity["username"] <> "") // Login user for API request
				$Security->loginUser(@$RequestSecurity["username"], @$RequestSecurity["userid"], @$RequestSecurity["parentuserid"], @$RequestSecurity["userlevelid"]);
		}
		if (!$validRequest) {
			if (!$Security->isLoggedIn()) $Security->autoLogin();
			if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("sensor_rawdatalist.php"));
				else
					$this->terminate(GetUrl("login.php"));
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->RTLindex->Visible = FALSE;
		$this->imei->setVisibility();
		$this->GPS_lat->setVisibility();
		$this->GPS_lon->setVisibility();
		$this->timezone->setVisibility();
		$this->beb_mac->Visible = FALSE;
		$this->cali_id->Visible = FALSE;
		$this->sensor_id->setVisibility();
		$this->sensor_value->setVisibility();
		$this->sensor_unit->setVisibility();
		$this->date_add->setVisibility();
		$this->sensor_typename->Visible = FALSE;
		$this->blockn->setVisibility();
		$this->BlockDetail->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->Phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		// Check modal

		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("RTLindex") !== NULL) {
				$this->RTLindex->setQueryStringValue(Get("RTLindex"));
				$this->setKey("RTLindex", $this->RTLindex->CurrentValue); // Set up key
			} else {
				$this->setKey("RTLindex", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi())
					$this->terminate();
				else
					$this->CurrentAction = "show"; // Form error, reset action
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->terminate("sensor_rawdatalist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "sensor_rawdatalist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "sensor_rawdataview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) // Return to caller
						$this->terminate(TRUE);
					else
						$this->terminate($returnUrl);
				} elseif (IsApi()) { // API request, return
					$this->terminate();
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->RTLindex->CurrentValue = NULL;
		$this->RTLindex->OldValue = $this->RTLindex->CurrentValue;
		$this->imei->CurrentValue = NULL;
		$this->imei->OldValue = $this->imei->CurrentValue;
		$this->GPS_lat->CurrentValue = NULL;
		$this->GPS_lat->OldValue = $this->GPS_lat->CurrentValue;
		$this->GPS_lon->CurrentValue = NULL;
		$this->GPS_lon->OldValue = $this->GPS_lon->CurrentValue;
		$this->timezone->CurrentValue = NULL;
		$this->timezone->OldValue = $this->timezone->CurrentValue;
		$this->beb_mac->CurrentValue = NULL;
		$this->beb_mac->OldValue = $this->beb_mac->CurrentValue;
		$this->cali_id->CurrentValue = NULL;
		$this->cali_id->OldValue = $this->cali_id->CurrentValue;
		$this->sensor_id->CurrentValue = NULL;
		$this->sensor_id->OldValue = $this->sensor_id->CurrentValue;
		$this->sensor_value->CurrentValue = NULL;
		$this->sensor_value->OldValue = $this->sensor_value->CurrentValue;
		$this->sensor_unit->CurrentValue = NULL;
		$this->sensor_unit->OldValue = $this->sensor_unit->CurrentValue;
		$this->date_add->CurrentValue = NULL;
		$this->date_add->OldValue = $this->date_add->CurrentValue;
		$this->sensor_typename->CurrentValue = NULL;
		$this->sensor_typename->OldValue = $this->sensor_typename->CurrentValue;
		$this->blockn->CurrentValue = NULL;
		$this->blockn->OldValue = $this->blockn->CurrentValue;
		$this->BlockDetail->CurrentValue = NULL;
		$this->BlockDetail->OldValue = $this->BlockDetail->CurrentValue;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'imei' first before field var 'x_imei'
		$val = $CurrentForm->hasValue("imei") ? $CurrentForm->getValue("imei") : $CurrentForm->getValue("x_imei");
		if (!$this->imei->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->imei->Visible = FALSE; // Disable update for API request
			else
				$this->imei->setFormValue($val);
		}

		// Check field name 'GPS_lat' first before field var 'x_GPS_lat'
		$val = $CurrentForm->hasValue("GPS_lat") ? $CurrentForm->getValue("GPS_lat") : $CurrentForm->getValue("x_GPS_lat");
		if (!$this->GPS_lat->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GPS_lat->Visible = FALSE; // Disable update for API request
			else
				$this->GPS_lat->setFormValue($val);
		}

		// Check field name 'GPS_lon' first before field var 'x_GPS_lon'
		$val = $CurrentForm->hasValue("GPS_lon") ? $CurrentForm->getValue("GPS_lon") : $CurrentForm->getValue("x_GPS_lon");
		if (!$this->GPS_lon->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->GPS_lon->Visible = FALSE; // Disable update for API request
			else
				$this->GPS_lon->setFormValue($val);
		}

		// Check field name 'timezone' first before field var 'x_timezone'
		$val = $CurrentForm->hasValue("timezone") ? $CurrentForm->getValue("timezone") : $CurrentForm->getValue("x_timezone");
		if (!$this->timezone->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->timezone->Visible = FALSE; // Disable update for API request
			else
				$this->timezone->setFormValue($val);
		}

		// Check field name 'sensor_id' first before field var 'x_sensor_id'
		$val = $CurrentForm->hasValue("sensor_id") ? $CurrentForm->getValue("sensor_id") : $CurrentForm->getValue("x_sensor_id");
		if (!$this->sensor_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sensor_id->Visible = FALSE; // Disable update for API request
			else
				$this->sensor_id->setFormValue($val);
		}

		// Check field name 'sensor_value' first before field var 'x_sensor_value'
		$val = $CurrentForm->hasValue("sensor_value") ? $CurrentForm->getValue("sensor_value") : $CurrentForm->getValue("x_sensor_value");
		if (!$this->sensor_value->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sensor_value->Visible = FALSE; // Disable update for API request
			else
				$this->sensor_value->setFormValue($val);
		}

		// Check field name 'sensor_unit' first before field var 'x_sensor_unit'
		$val = $CurrentForm->hasValue("sensor_unit") ? $CurrentForm->getValue("sensor_unit") : $CurrentForm->getValue("x_sensor_unit");
		if (!$this->sensor_unit->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->sensor_unit->Visible = FALSE; // Disable update for API request
			else
				$this->sensor_unit->setFormValue($val);
		}

		// Check field name 'date_add' first before field var 'x_date_add'
		$val = $CurrentForm->hasValue("date_add") ? $CurrentForm->getValue("date_add") : $CurrentForm->getValue("x_date_add");
		if (!$this->date_add->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->date_add->Visible = FALSE; // Disable update for API request
			else
				$this->date_add->setFormValue($val);
			$this->date_add->CurrentValue = UnFormatDateTime($this->date_add->CurrentValue, 1);
		}

		// Check field name 'blockn' first before field var 'x_blockn'
		$val = $CurrentForm->hasValue("blockn") ? $CurrentForm->getValue("blockn") : $CurrentForm->getValue("x_blockn");
		if (!$this->blockn->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->blockn->Visible = FALSE; // Disable update for API request
			else
				$this->blockn->setFormValue($val);
		}

		// Check field name 'BlockDetail' first before field var 'x_BlockDetail'
		$val = $CurrentForm->hasValue("BlockDetail") ? $CurrentForm->getValue("BlockDetail") : $CurrentForm->getValue("x_BlockDetail");
		if (!$this->BlockDetail->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->BlockDetail->Visible = FALSE; // Disable update for API request
			else
				$this->BlockDetail->setFormValue($val);
		}

		// Check field name 'RTLindex' first before field var 'x_RTLindex'
		$val = $CurrentForm->hasValue("RTLindex") ? $CurrentForm->getValue("RTLindex") : $CurrentForm->getValue("x_RTLindex");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->imei->CurrentValue = $this->imei->FormValue;
		$this->GPS_lat->CurrentValue = $this->GPS_lat->FormValue;
		$this->GPS_lon->CurrentValue = $this->GPS_lon->FormValue;
		$this->timezone->CurrentValue = $this->timezone->FormValue;
		$this->sensor_id->CurrentValue = $this->sensor_id->FormValue;
		$this->sensor_value->CurrentValue = $this->sensor_value->FormValue;
		$this->sensor_unit->CurrentValue = $this->sensor_unit->FormValue;
		$this->date_add->CurrentValue = $this->date_add->FormValue;
		$this->date_add->CurrentValue = UnFormatDateTime($this->date_add->CurrentValue, 1);
		$this->blockn->CurrentValue = $this->blockn->FormValue;
		$this->BlockDetail->CurrentValue = $this->BlockDetail->FormValue;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = &$this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->RTLindex->setDbValue($row['RTLindex']);
		$this->imei->setDbValue($row['imei']);
		$this->GPS_lat->setDbValue($row['GPS_lat']);
		$this->GPS_lon->setDbValue($row['GPS_lon']);
		$this->timezone->setDbValue($row['timezone']);
		$this->beb_mac->setDbValue($row['beb_mac']);
		$this->cali_id->setDbValue($row['cali_id']);
		$this->sensor_id->setDbValue($row['sensor_id']);
		$this->sensor_value->setDbValue($row['sensor_value']);
		$this->sensor_unit->setDbValue($row['sensor_unit']);
		$this->date_add->setDbValue($row['date_add']);
		$this->sensor_typename->setDbValue($row['sensor_typename']);
		$this->blockn->setDbValue($row['blockn']);
		$this->BlockDetail->setDbValue($row['BlockDetail']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['RTLindex'] = $this->RTLindex->CurrentValue;
		$row['imei'] = $this->imei->CurrentValue;
		$row['GPS_lat'] = $this->GPS_lat->CurrentValue;
		$row['GPS_lon'] = $this->GPS_lon->CurrentValue;
		$row['timezone'] = $this->timezone->CurrentValue;
		$row['beb_mac'] = $this->beb_mac->CurrentValue;
		$row['cali_id'] = $this->cali_id->CurrentValue;
		$row['sensor_id'] = $this->sensor_id->CurrentValue;
		$row['sensor_value'] = $this->sensor_value->CurrentValue;
		$row['sensor_unit'] = $this->sensor_unit->CurrentValue;
		$row['date_add'] = $this->date_add->CurrentValue;
		$row['sensor_typename'] = $this->sensor_typename->CurrentValue;
		$row['blockn'] = $this->blockn->CurrentValue;
		$row['BlockDetail'] = $this->BlockDetail->CurrentValue;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("RTLindex")) <> "")
			$this->RTLindex->CurrentValue = $this->getKey("RTLindex"); // RTLindex
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = &$this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->GPS_lat->FormValue == $this->GPS_lat->CurrentValue && is_numeric(ConvertToFloatString($this->GPS_lat->CurrentValue)))
			$this->GPS_lat->CurrentValue = ConvertToFloatString($this->GPS_lat->CurrentValue);

		// Convert decimal values if posted back
		if ($this->GPS_lon->FormValue == $this->GPS_lon->CurrentValue && is_numeric(ConvertToFloatString($this->GPS_lon->CurrentValue)))
			$this->GPS_lon->CurrentValue = ConvertToFloatString($this->GPS_lon->CurrentValue);

		// Convert decimal values if posted back
		if ($this->sensor_value->FormValue == $this->sensor_value->CurrentValue && is_numeric(ConvertToFloatString($this->sensor_value->CurrentValue)))
			$this->sensor_value->CurrentValue = ConvertToFloatString($this->sensor_value->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// RTLindex
		// imei
		// GPS_lat
		// GPS_lon
		// timezone
		// beb_mac
		// cali_id
		// sensor_id
		// sensor_value
		// sensor_unit
		// date_add
		// sensor_typename
		// blockn
		// BlockDetail

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// RTLindex
			$this->RTLindex->ViewValue = $this->RTLindex->CurrentValue;
			$this->RTLindex->ViewCustomAttributes = "";

			// imei
			$this->imei->ViewValue = $this->imei->CurrentValue;
			$this->imei->ViewCustomAttributes = "";

			// GPS_lat
			$this->GPS_lat->ViewValue = $this->GPS_lat->CurrentValue;
			$this->GPS_lat->ViewValue = FormatNumber($this->GPS_lat->ViewValue, 2, -2, -2, -2);
			$this->GPS_lat->ViewCustomAttributes = "";

			// GPS_lon
			$this->GPS_lon->ViewValue = $this->GPS_lon->CurrentValue;
			$this->GPS_lon->ViewValue = FormatNumber($this->GPS_lon->ViewValue, 2, -2, -2, -2);
			$this->GPS_lon->ViewCustomAttributes = "";

			// timezone
			$this->timezone->ViewValue = $this->timezone->CurrentValue;
			$this->timezone->ViewCustomAttributes = "";

			// sensor_id
			$this->sensor_id->ViewValue = $this->sensor_id->CurrentValue;
			$this->sensor_id->ViewCustomAttributes = "";

			// sensor_value
			$this->sensor_value->ViewValue = $this->sensor_value->CurrentValue;
			$this->sensor_value->ViewValue = FormatNumber($this->sensor_value->ViewValue, 2, -2, -2, -2);
			$this->sensor_value->ViewCustomAttributes = "";

			// sensor_unit
			$this->sensor_unit->ViewValue = $this->sensor_unit->CurrentValue;
			$this->sensor_unit->ViewCustomAttributes = "";

			// date_add
			$this->date_add->ViewValue = $this->date_add->CurrentValue;
			$this->date_add->ViewValue = FormatDateTime($this->date_add->ViewValue, 1);
			$this->date_add->ViewCustomAttributes = "";

			// blockn
			$this->blockn->ViewValue = $this->blockn->CurrentValue;
			$this->blockn->ViewCustomAttributes = "";

			// BlockDetail
			$this->BlockDetail->ViewValue = $this->BlockDetail->CurrentValue;
			$this->BlockDetail->ViewCustomAttributes = "";

			// imei
			$this->imei->LinkCustomAttributes = "";
			$this->imei->HrefValue = "";
			$this->imei->TooltipValue = "";

			// GPS_lat
			$this->GPS_lat->LinkCustomAttributes = "";
			$this->GPS_lat->HrefValue = "";
			$this->GPS_lat->TooltipValue = "";

			// GPS_lon
			$this->GPS_lon->LinkCustomAttributes = "";
			$this->GPS_lon->HrefValue = "";
			$this->GPS_lon->TooltipValue = "";

			// timezone
			$this->timezone->LinkCustomAttributes = "";
			$this->timezone->HrefValue = "";
			$this->timezone->TooltipValue = "";

			// sensor_id
			$this->sensor_id->LinkCustomAttributes = "";
			$this->sensor_id->HrefValue = "";
			$this->sensor_id->TooltipValue = "";

			// sensor_value
			$this->sensor_value->LinkCustomAttributes = "";
			$this->sensor_value->HrefValue = "";
			$this->sensor_value->TooltipValue = "";

			// sensor_unit
			$this->sensor_unit->LinkCustomAttributes = "";
			$this->sensor_unit->HrefValue = "";
			$this->sensor_unit->TooltipValue = "";

			// date_add
			$this->date_add->LinkCustomAttributes = "";
			$this->date_add->HrefValue = "";
			$this->date_add->TooltipValue = "";

			// blockn
			$this->blockn->LinkCustomAttributes = "";
			$this->blockn->HrefValue = "";
			$this->blockn->TooltipValue = "";

			// BlockDetail
			$this->BlockDetail->LinkCustomAttributes = "";
			$this->BlockDetail->HrefValue = "";
			$this->BlockDetail->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// imei
			$this->imei->EditAttrs["class"] = "form-control";
			$this->imei->EditCustomAttributes = "";
			$this->imei->EditValue = HtmlEncode($this->imei->CurrentValue);
			$this->imei->PlaceHolder = RemoveHtml($this->imei->caption());

			// GPS_lat
			$this->GPS_lat->EditAttrs["class"] = "form-control";
			$this->GPS_lat->EditCustomAttributes = "";
			$this->GPS_lat->EditValue = HtmlEncode($this->GPS_lat->CurrentValue);
			$this->GPS_lat->PlaceHolder = RemoveHtml($this->GPS_lat->caption());
			if (strval($this->GPS_lat->EditValue) <> "" && is_numeric($this->GPS_lat->EditValue))
				$this->GPS_lat->EditValue = FormatNumber($this->GPS_lat->EditValue, -2, -2, -2, -2);

			// GPS_lon
			$this->GPS_lon->EditAttrs["class"] = "form-control";
			$this->GPS_lon->EditCustomAttributes = "";
			$this->GPS_lon->EditValue = HtmlEncode($this->GPS_lon->CurrentValue);
			$this->GPS_lon->PlaceHolder = RemoveHtml($this->GPS_lon->caption());
			if (strval($this->GPS_lon->EditValue) <> "" && is_numeric($this->GPS_lon->EditValue))
				$this->GPS_lon->EditValue = FormatNumber($this->GPS_lon->EditValue, -2, -2, -2, -2);

			// timezone
			$this->timezone->EditAttrs["class"] = "form-control";
			$this->timezone->EditCustomAttributes = "";
			$this->timezone->EditValue = HtmlEncode($this->timezone->CurrentValue);
			$this->timezone->PlaceHolder = RemoveHtml($this->timezone->caption());

			// sensor_id
			$this->sensor_id->EditAttrs["class"] = "form-control";
			$this->sensor_id->EditCustomAttributes = "";
			$this->sensor_id->EditValue = HtmlEncode($this->sensor_id->CurrentValue);
			$this->sensor_id->PlaceHolder = RemoveHtml($this->sensor_id->caption());

			// sensor_value
			$this->sensor_value->EditAttrs["class"] = "form-control";
			$this->sensor_value->EditCustomAttributes = "";
			$this->sensor_value->EditValue = HtmlEncode($this->sensor_value->CurrentValue);
			$this->sensor_value->PlaceHolder = RemoveHtml($this->sensor_value->caption());
			if (strval($this->sensor_value->EditValue) <> "" && is_numeric($this->sensor_value->EditValue))
				$this->sensor_value->EditValue = FormatNumber($this->sensor_value->EditValue, -2, -2, -2, -2);

			// sensor_unit
			$this->sensor_unit->EditAttrs["class"] = "form-control";
			$this->sensor_unit->EditCustomAttributes = "";
			$this->sensor_unit->EditValue = HtmlEncode($this->sensor_unit->CurrentValue);
			$this->sensor_unit->PlaceHolder = RemoveHtml($this->sensor_unit->caption());

			// date_add
			$this->date_add->EditAttrs["class"] = "form-control";
			$this->date_add->EditCustomAttributes = "";
			$this->date_add->EditValue = HtmlEncode(FormatDateTime($this->date_add->CurrentValue, 8));
			$this->date_add->PlaceHolder = RemoveHtml($this->date_add->caption());

			// blockn
			$this->blockn->EditAttrs["class"] = "form-control";
			$this->blockn->EditCustomAttributes = "";
			$this->blockn->EditValue = HtmlEncode($this->blockn->CurrentValue);
			$this->blockn->PlaceHolder = RemoveHtml($this->blockn->caption());

			// BlockDetail
			$this->BlockDetail->EditAttrs["class"] = "form-control";
			$this->BlockDetail->EditCustomAttributes = "";
			$this->BlockDetail->EditValue = HtmlEncode($this->BlockDetail->CurrentValue);
			$this->BlockDetail->PlaceHolder = RemoveHtml($this->BlockDetail->caption());

			// Add refer script
			// imei

			$this->imei->LinkCustomAttributes = "";
			$this->imei->HrefValue = "";

			// GPS_lat
			$this->GPS_lat->LinkCustomAttributes = "";
			$this->GPS_lat->HrefValue = "";

			// GPS_lon
			$this->GPS_lon->LinkCustomAttributes = "";
			$this->GPS_lon->HrefValue = "";

			// timezone
			$this->timezone->LinkCustomAttributes = "";
			$this->timezone->HrefValue = "";

			// sensor_id
			$this->sensor_id->LinkCustomAttributes = "";
			$this->sensor_id->HrefValue = "";

			// sensor_value
			$this->sensor_value->LinkCustomAttributes = "";
			$this->sensor_value->HrefValue = "";

			// sensor_unit
			$this->sensor_unit->LinkCustomAttributes = "";
			$this->sensor_unit->HrefValue = "";

			// date_add
			$this->date_add->LinkCustomAttributes = "";
			$this->date_add->HrefValue = "";

			// blockn
			$this->blockn->LinkCustomAttributes = "";
			$this->blockn->HrefValue = "";

			// BlockDetail
			$this->BlockDetail->LinkCustomAttributes = "";
			$this->BlockDetail->HrefValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType <> ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!SERVER_VALIDATE)
			return ($FormError == "");
		if ($this->RTLindex->Required) {
			if (!$this->RTLindex->IsDetailKey && $this->RTLindex->FormValue != NULL && $this->RTLindex->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RTLindex->caption(), $this->RTLindex->RequiredErrorMessage));
			}
		}
		if ($this->imei->Required) {
			if (!$this->imei->IsDetailKey && $this->imei->FormValue != NULL && $this->imei->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->imei->caption(), $this->imei->RequiredErrorMessage));
			}
		}
		if ($this->GPS_lat->Required) {
			if (!$this->GPS_lat->IsDetailKey && $this->GPS_lat->FormValue != NULL && $this->GPS_lat->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GPS_lat->caption(), $this->GPS_lat->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GPS_lat->FormValue)) {
			AddMessage($FormError, $this->GPS_lat->errorMessage());
		}
		if ($this->GPS_lon->Required) {
			if (!$this->GPS_lon->IsDetailKey && $this->GPS_lon->FormValue != NULL && $this->GPS_lon->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->GPS_lon->caption(), $this->GPS_lon->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->GPS_lon->FormValue)) {
			AddMessage($FormError, $this->GPS_lon->errorMessage());
		}
		if ($this->timezone->Required) {
			if (!$this->timezone->IsDetailKey && $this->timezone->FormValue != NULL && $this->timezone->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->timezone->caption(), $this->timezone->RequiredErrorMessage));
			}
		}
		if ($this->beb_mac->Required) {
			if (!$this->beb_mac->IsDetailKey && $this->beb_mac->FormValue != NULL && $this->beb_mac->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->beb_mac->caption(), $this->beb_mac->RequiredErrorMessage));
			}
		}
		if ($this->cali_id->Required) {
			if (!$this->cali_id->IsDetailKey && $this->cali_id->FormValue != NULL && $this->cali_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->cali_id->caption(), $this->cali_id->RequiredErrorMessage));
			}
		}
		if ($this->sensor_id->Required) {
			if (!$this->sensor_id->IsDetailKey && $this->sensor_id->FormValue != NULL && $this->sensor_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sensor_id->caption(), $this->sensor_id->RequiredErrorMessage));
			}
		}
		if ($this->sensor_value->Required) {
			if (!$this->sensor_value->IsDetailKey && $this->sensor_value->FormValue != NULL && $this->sensor_value->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sensor_value->caption(), $this->sensor_value->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->sensor_value->FormValue)) {
			AddMessage($FormError, $this->sensor_value->errorMessage());
		}
		if ($this->sensor_unit->Required) {
			if (!$this->sensor_unit->IsDetailKey && $this->sensor_unit->FormValue != NULL && $this->sensor_unit->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sensor_unit->caption(), $this->sensor_unit->RequiredErrorMessage));
			}
		}
		if ($this->date_add->Required) {
			if (!$this->date_add->IsDetailKey && $this->date_add->FormValue != NULL && $this->date_add->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->date_add->caption(), $this->date_add->RequiredErrorMessage));
			}
		}
		if (!CheckDate($this->date_add->FormValue)) {
			AddMessage($FormError, $this->date_add->errorMessage());
		}
		if ($this->sensor_typename->Required) {
			if (!$this->sensor_typename->IsDetailKey && $this->sensor_typename->FormValue != NULL && $this->sensor_typename->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->sensor_typename->caption(), $this->sensor_typename->RequiredErrorMessage));
			}
		}
		if ($this->blockn->Required) {
			if (!$this->blockn->IsDetailKey && $this->blockn->FormValue != NULL && $this->blockn->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->blockn->caption(), $this->blockn->RequiredErrorMessage));
			}
		}
		if ($this->BlockDetail->Required) {
			if (!$this->BlockDetail->IsDetailKey && $this->BlockDetail->FormValue != NULL && $this->BlockDetail->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->BlockDetail->caption(), $this->BlockDetail->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError <> "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = &$this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// imei
		$this->imei->setDbValueDef($rsnew, $this->imei->CurrentValue, NULL, FALSE);

		// GPS_lat
		$this->GPS_lat->setDbValueDef($rsnew, $this->GPS_lat->CurrentValue, NULL, FALSE);

		// GPS_lon
		$this->GPS_lon->setDbValueDef($rsnew, $this->GPS_lon->CurrentValue, NULL, FALSE);

		// timezone
		$this->timezone->setDbValueDef($rsnew, $this->timezone->CurrentValue, NULL, FALSE);

		// sensor_id
		$this->sensor_id->setDbValueDef($rsnew, $this->sensor_id->CurrentValue, NULL, FALSE);

		// sensor_value
		$this->sensor_value->setDbValueDef($rsnew, $this->sensor_value->CurrentValue, 0, FALSE);

		// sensor_unit
		$this->sensor_unit->setDbValueDef($rsnew, $this->sensor_unit->CurrentValue, NULL, FALSE);

		// date_add
		$this->date_add->setDbValueDef($rsnew, UnFormatDateTime($this->date_add->CurrentValue, 1), NULL, FALSE);

		// blockn
		$this->blockn->setDbValueDef($rsnew, $this->blockn->CurrentValue, NULL, FALSE);

		// BlockDetail
		$this->BlockDetail->setDbValueDef($rsnew, $this->BlockDetail->CurrentValue, "", FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = $GLOBALS["ERROR_FUNC"];
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = '';
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage <> "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->Phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("sensor_rawdatalist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL
			switch ($fld->FieldVar) {
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql <> "" && count($fld->Lookup->Options) == 0) {
				$conn = &$this->getConnection();
				$totalCnt = $this->getRecordCount($sql);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
