<?php
namespace PHPMaker2019\esbc_clientALL_20181122;

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(19, "mci_Applications", $Language->MenuPhrase("19", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-globe", "", TRUE);
$topMenu->addMenuItem(5, "mi_basic_token", $Language->MenuPhrase("5", "MenuText"), "basic_tokenlist.php", 19, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}basic_token'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(20, "mi_esbc_contract", $Language->MenuPhrase("20", "MenuText"), "esbc_contractlist.php", 19, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_contract'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(17, "mci_History", $Language->MenuPhrase("17", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-book", "", TRUE);
$topMenu->addMenuItem(27, "mi_esbc_chainstatus", $Language->MenuPhrase("27", "MenuText"), "esbc_chainstatuslist.php", 17, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_chainstatus'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(13, "mi_log_tx", $Language->MenuPhrase("13", "MenuText"), "log_txlist.php", 17, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}log_tx'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(56, "mci_siteTitle", $Language->MenuPhrase("56", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-globe", "", TRUE);
$topMenu->addMenuItem(58, "mci_New_Menu_Item", $Language->MenuPhrase("58", "MenuText"), "", 56, "", TRUE, FALSE, TRUE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(63, "mi_home", $Language->MenuPhrase("63", "MenuText"), "home.php", -1, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}home.php'), FALSE, TRUE, "", "", FALSE);
$sideMenu->addMenuItem(61, "mci_Sensor_Overview", $Language->MenuPhrase("61", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-eye", "", FALSE);
$sideMenu->addMenuItem(60, "mi_sensor_rawdata", $Language->MenuPhrase("60", "MenuText"), "sensor_rawdatalist.php", 61, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}sensor_rawdata'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(59, "mi_sensor_basic", $Language->MenuPhrase("59", "MenuText"), "sensor_basiclist.php", 61, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}sensor_basic'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(19, "mci_Applications", $Language->MenuPhrase("19", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-globe", "", TRUE);
$sideMenu->addMenuItem(5, "mi_basic_token", $Language->MenuPhrase("5", "MenuText"), "basic_tokenlist.php", 19, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}basic_token'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(20, "mi_esbc_contract", $Language->MenuPhrase("20", "MenuText"), "esbc_contractlist.php", 19, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_contract'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(18, "mci_Cmaker_Overview", $Language->MenuPhrase("18", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-chain", "", FALSE);
$sideMenu->addMenuItem(7, "mi_esbc_host_basic", $Language->MenuPhrase("7", "MenuText"), "esbc_host_basiclist.php", 18, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_host_basic'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(15, "mi_esbc_node_basic", $Language->MenuPhrase("15", "MenuText"), "esbc_node_basiclist.php", 18, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_node_basic'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(1, "mi_basic_acc", $Language->MenuPhrase("1", "MenuText"), "basic_acclist.php", 18, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}basic_acc'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(9, "mi_esbc_log", $Language->MenuPhrase("9", "MenuText"), "esbc_loglist.php", 18, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_log'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(23, "mi_esbc_hub_basic", $Language->MenuPhrase("23", "MenuText"), "esbc_hub_basiclist.php", 18, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_hub_basic'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(21, "mi_geth_cmd", $Language->MenuPhrase("21", "MenuText"), "geth_cmdlist.php", 18, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}geth_cmd'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(22, "mi_esbc_geth_par", $Language->MenuPhrase("22", "MenuText"), "esbc_geth_parlist.php", 18, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_geth_par'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(25, "mi_esbc_genesis", $Language->MenuPhrase("25", "MenuText"), "esbc_genesislist.php", 18, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_genesis'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(26, "mi_esbc_host_applog", $Language->MenuPhrase("26", "MenuText"), "esbc_host_apploglist.php", 18, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_host_applog'), FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(17, "mci_History", $Language->MenuPhrase("17", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-book", "", TRUE);
$sideMenu->addMenuItem(27, "mi_esbc_chainstatus", $Language->MenuPhrase("27", "MenuText"), "esbc_chainstatuslist.php", 17, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_chainstatus'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(13, "mi_log_tx", $Language->MenuPhrase("13", "MenuText"), "log_txlist.php", 17, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}log_tx'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(11, "mi_esbc_user", $Language->MenuPhrase("11", "MenuText"), "esbc_userlist.php", -1, "", AllowListMenu('{04503673-A70B-421F-8E02-1DFE5D0B56A3}esbc_user'), FALSE, FALSE, "fa-users", "", FALSE);
$sideMenu->addMenuItem(56, "mci_siteTitle", $Language->MenuPhrase("56", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "fa-globe", "", TRUE);
$sideMenu->addMenuItem(58, "mci_New_Menu_Item", $Language->MenuPhrase("58", "MenuText"), "", 56, "", TRUE, FALSE, TRUE, "", "", TRUE);
echo $sideMenu->toScript();
?>
