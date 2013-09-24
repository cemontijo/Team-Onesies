<?php //netteCache[01]000383a:2:{s:4:"time";s:21:"0.70981700 1380062185";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:63:"C:\xampp\htdocs\Senqual_GIT\Senqual\app\templates\@layout.latte";i:2;i:1379983774;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: C:\xampp\htdocs\Senqual_GIT\Senqual\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'wnvdjvhfcb')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb46d62f67fd_title')) { function _lb46d62f67fd_title($_l, $_args) { extract($_args)
?>SenQual<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lbe34315798f_head')) { function _lbe34315798f_head($_l, $_args) { extract($_args)
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb1d62925d95_scripts')) { function _lb1d62925d95_scripts($_l, $_args) { extract($_args)
?>    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-1.8.3.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/netteForms.js"></script>

<!-- external javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

        <!-- jQuery UI -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery-ui-1.9.2.custom.js"></script>
    <!-- transition / effect library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-transition.js"></script>
    <!-- alert enhancer library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-alert.js"></script>
    <!-- modal / dialog library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-modal.js"></script>
    <!-- custom dropdown library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-dropdown.js"></script>
    <!-- scrolspy library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-scrollspy.js"></script>
    <!-- library for creating tabs -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-tab.js"></script>
    <!-- library for advanced tooltip -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-tooltip.js"></script>
    <!-- popover effect library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-popover.js"></script>
    <!-- button enhancer library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-button.js"></script>
    <!-- accordion library (optional, not used in demo) -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-collapse.js"></script>
    <!-- carousel slideshow library (optional, not used in demo) -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-carousel.js"></script>
    <!-- autocomplete library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-typeahead.js"></script>
    <!-- tour library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/bootstrap-tour.js"></script>
    <!-- library for cookie management -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.cookie.js"></script>
    <!-- calander plugin -->
    <script src='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/js/fullcalendar.min.js'></script>
    <!-- data table plugin -->
    <script src='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/js/jquery.dataTables.min.js'></script>
    <script src='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/js/ColVis.js'></script>

        <!-- chart libraries start -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/excanvas.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.flot.min.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.flot.pie.min.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.flot.stack.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.flot.resize.min.js"></script>
    <!-- chart libraries end -->

        <!-- select or dropdown enhancer -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.chosen.min.js"></script>
    <!-- checkbox, radio, and file input styler -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.uniform.min.js"></script>
    <!-- plugin for gallery image view -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.colorbox.min.js"></script>
    <!-- rich text editor library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.cleditor.min.js"></script>
    <!-- notification plugin -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.noty.js"></script>
    <!-- file manager library -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.elfinder.min.js"></script>
    <!-- star rating plugin -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.raty.min.js"></script>
    <!-- for iOS style toggle switch -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.iphone.toggle.js"></script>
    <!-- autogrowing textarea plugin -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.autogrow-textarea.js"></script>
    <!-- multiple file upload plugin -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.uploadify-3.1.min.js"></script>
    <!-- history.js for cross-browser state change on ajax -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/jquery.history.js"></script>
    <!-- application script for Charisma demo -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/charisma.js"></script>

    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/iacuc.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/plainTool.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/textInput.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/datepicker.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/datepickerPersonCourse.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/select.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/multipleSelect.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/multipleSelectPersonProtocol.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/personName.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/toggle.js"></script>
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/iacuc/typeahead.js"></script>


<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="shortcut icon" href="https://www.utep.edu/images/utep.ico" type="image/x-icon" />
    <meta charset="UTF-8" />
    <meta name="description" content="" />
<?php if (isset($robots)): ?>    <meta name="robots" content="<?php echo htmlSpecialChars($robots) ?>" />
<?php endif ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<!-- The styles -->
    <link id="bs-css" href="<?php echo htmlSpecialChars($basePath) ?>/css/bootstrap-iacuc.css" rel="stylesheet" />
    <style type="text/css">
      body {
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

    <link href="<?php echo htmlSpecialChars($basePath) ?>/css/bootstrap-responsive.css" rel="stylesheet" />
    <link href="<?php echo htmlSpecialChars($basePath) ?>/css/charisma-app.css" rel="stylesheet" />
    <link href="<?php echo htmlSpecialChars($basePath) ?>/css/jquery-ui-1.9.2.custom.css" rel="stylesheet" />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/fullcalendar.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/chosen.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/uniform.default.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/colorbox.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/jquery.cleditor.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/jquery.noty.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/noty_theme_default.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/elfinder.min.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/elfinder.theme.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/jquery.iphone.toggle.css' rel='stylesheet' />
    <link href="<?php echo htmlSpecialChars($basePath) ?>/css/jquerytour.css" rel="stylesheet" />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/opa-icons.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/ColVis.css' rel='stylesheet' />
    <link href='<?php echo htmlSpecialChars($basePath, ENT_QUOTES) ?>/css/main.css' rel='stylesheet' />

        <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

    <title><?php if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->upper($template->striptags(ob_get_clean()))  ?></title>

    <!--<link rel="shortcut icon" href="<?php echo Nette\Templating\Helpers::escapeHtmlComment($basePath) ?>/favicon.ico"> -->
	<?php call_user_func(reset($_l->blocks['head']), $_l, get_defined_vars())  ?>

  </head>

  <body>

    <div id="blocker">
      &nbsp;
    </div>
    <div id="blocker-text">Loading...</div>
    <script>
      var blocker = document.getElementById("blocker")
      , blockerText = document.getElementById("blocker-text")
      , blockerTimeout = setTimeout(function () {
        blocker.style.display = blockerText.style.display = 'block';
      }, 150);
    </script>

    <script> document.body.className+=' js' </script>


	<!-- topbar starts -->
    <div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.nav-collapse.collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="<?php echo htmlSpecialChars($basePath) ?>"> <img alt="UTEP Logo" src="<?php echo htmlSpecialChars($basePath) ?>/img/utep-logo-40.png" /> <span>SenQual</span></a>
				
				<!-- user dropdown starts -->
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<!--<li class="divider"></li>-->
						<li><a href="<?php echo htmlSpecialChars($_control->link("Login:logout")) ?>
">Logout</a></li>
					</ul>
				</div>
				<!-- user dropdown ends -->
	
				
			</div>
			
				<span class="container">

					<div class="nav-collapse collapse menu">
						<ul class="nav">
							<li class=""><a href="#">Home</a></li>
							<li class=""><a href="#">Dashboard</a></li>
							<li class=""><a href="#">Monitor</a></li>
							<li class=""><a href="#">Rules</a></li>
							<li class=""><a href="#">Sensors</a></li>
							<li class=""><a href="#">Profile</a></li>
						</ul>
					</div>
				</span>
			
		</div>
    </div>
	
	
    <!-- topbar ends -->
	
	<!-- content starts -->
	<div id="content">
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
	</div>
	<!-- content ends -->

<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
    <img class="ajaxloader" src="<?php echo htmlSpecialChars($basePath) ?>/img/ajax-loaders/ajax-loader-1.gif" style="display:none" />
  </body>
</html>
