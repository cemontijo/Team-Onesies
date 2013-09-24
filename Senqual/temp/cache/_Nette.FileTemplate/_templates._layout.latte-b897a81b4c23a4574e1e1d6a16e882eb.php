<?php //netteCache[01]000376a:2:{s:4:"time";s:21:"0.12409800 1379982765";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:56:"C:\xampp\htdocs\Team-Onesies\app\templates\@layout.latte";i:2;i:1379982762;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:28:"$WCREV$ released on $WCDATE$";}}}?><?php

// source file: C:\xampp\htdocs\Team-Onesies\app\templates\@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'gkpy4tvy3d')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbe9f2812064_title')) { function _lbe9f2812064_title($_l, $_args) { extract($_args)
?>SenQual<?php
}}

//
// block head
//
if (!function_exists($_l->blocks['head'][] = '_lb6254f610ab_head')) { function _lb6254f610ab_head($_l, $_args) { extract($_args)
;
}}

//
// block scripts
//
if (!function_exists($_l->blocks['scripts'][] = '_lb0a4fdbc343_scripts')) { function _lb0a4fdbc343_scripts($_l, $_args) { extract($_args)
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

    <!-- Tour -->
    <script src="<?php echo htmlSpecialChars($basePath) ?>/js/MyTour.js"></script>


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




<!-- Tour -->

    <!-- First Step -->
    <div id=1 class="popover fade top in" style="top: 2%; left: 63%; display: hidden;"><div class"arrow"></div>   
     <div class="popover-inner">
            <h3 class="popover-title">First Time? Take a Tour!</h3>
            <div class="popover-content">
                <p>Welcome to the IACUC Administration Database.
                   Click on Next to start the tour and get acquainted with the application.
                   Click End Tour to stop at any time.<br /></p>
                   <table width="100%" cellpadding="0" cellspacing ="0" style="border: 1px solid transparent;"><col width="180" />
                        <tr><td class="popover-content" style="border: 5px solid transparent;">
                                <a style="cursor:pointer" onclick="myTour(1)">Next >></a></td>
                            <td class="popover-content" style="border: 5px solid transparent;">
                                <a style="cursor:pointer" onclick="endTour(1)">End Tour</a></td></tr>
                   </table>               
            </div>
        </div>
    </div>

    <!-- Second Step -->
    <div id=2 class="popover fade top in" style="top: 5.5%; left: 10.3%; display: hidden;"><div class"arrow"></div>
        <div class="popover-inner">
            <h3 class="popover-title">Main Menu</h3>
            <div class="popover-content">
                <p>Choose a menu item on the left to view and edit the respective information on record.<br /></p> 
                   <table width="100%" cellpadding="0" cellspacing ="0" style="border: 4px solid transparent;"><col width="180" />
                        <tr><td class="popover-content" style="border: 5px solid transparent;">
                               <a style="cursor:pointer" onclick="myTour(2)">Next >></a></td>                            
                           <td class="popover-content" style="border: 5px solid transparent;">
                               <a style="cursor:pointer" onclick="endTour(2)">End Tour</a></td></tr>
                   </table>               
            </div>
        </div>
    </div>
            
    <!-- Step Three -->
    <div id=3 class="popover fade top in" style="top: 14.5%; left: 47%; display: hidden;"><div class"arrow"></div>
        <div class="popover-inner">
            <h3 class="popover-title">Records</h3>
            <div class="popover-content">
                <p>All information on record for the given selection is displayed below.
                   Here, new records can be created. Some records can be modified when clicked on.
                   Records can also be deleted by clicking under the Delete column for the respective row.<br /></p> 
                  <table width="100%" cellpadding="0" cellspacing ="0" style="border: 4px solid transparent;"><col width="180" />
                        <tr><td class="popover-content" style="border: 5px solid transparent;">
                                <a style="cursor:pointer" onclick="myTour(3)">Next >></a></td>
                            <td class="popover-content" style="border: 5px solid transparent;">
                                <a style="cursor:pointer" onclick="endTour(3)">End Tour</a></td></tr>
                   </table>              
            </div>
        </div>
    </div>

    <!-- Step Four -->
    <div id=4 class="popover fade top in" style="top: 14.5%; left: 47%; display: hidden;"><div class"arrow"></div>
        <div class="popover-inner">
            <h3 class="popover-title">Records</h3>
            <div class="popover-content">
                <p>If the Delete column is not displayed, click Show/hide columns and select it.
                   Hovering over certain items will pop up an extended definition for it.
                   Search options are also available for filtering out all records.<br /></p>
                   <table width="100%" cellpadding="0" cellspacing ="0" style="border: 4px solid transparent;"><col width="180" />
                        <tr><td class="popover-content" style="border: 5px solid transparent;">
                                <a style="cursor:pointer" onclick="myTour(4)">Next >></a></td>
                            <td class="popover-content" style="border: 5px solid transparent;">
                                <a style="cursor:pointer" onclick="endTour(4)">End Tour</a></td></tr>
                   </table>              
            </div>
        </div>
    </div>

    <!-- Step Five -->
    <div id=5 class="popover fade top in" style="top: 44.5%; left: 11.7%; display:hidden;">
        <div class"arrow"></div>
        <div class="popover-inner">
            <h3 class="popover-title">Accounts</h3>
            <div class="popover-content">
                <p>Manage administrative accounts.
                   Add, update, or remove users with administrative privileges.<br /></p>
                   <table width="100%" cellpadding="0" cellspacing ="0" style="border: 4px solid transparent;"><col width="180" />
                        <tr><td class="popover-content" style="border: 5px solid transparent;">
                                <a style="cursor:pointer" onclick="myTour(5)">Next >></a></td>
                            <td class="popover-content" style="border: 5px solid transparent;">
                                <a style="cursor:pointer" onclick="endTour(5)">End Tour</a></td></tr>
                   </table>             
            </div>
        </div>
    </div>

    <!-- Step Six -->
    <div id=6 class="popover fade top in" style="top: 6%; left: 75%; display: hidden;">
        <div class"arrow"></div>
        <div class="popover-inner">
            <h3 class="popover-title">Logout</h3>
            <div class="popover-content">
                <p>Don't forget to sign off by clicking the button above when you're done.<br /></p>
                   <table width="100%" cellpadding="0" cellspacing ="0" style="border: 4px solid transparent;"><col width="180" />
                        <tr><td> </td>
                            <td class="popover-content" style="border: 5px solid transparent;">
                                <a style="cursor:pointer" onclick="endTour(6)">End Tour</a></td></tr>
                   </table>            
            </div>
        </div>
    </div>

<!-- End Tour -->



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
						<i class="icon-user"></i><span class="hidden-phone"><?php echo Nette\Templating\Helpers::escapeHtml($user->identity->name, ENT_NOQUOTES) ?></span>
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
	

	
	
	
	
	

    <div class="container-fluid">
      <div class="row-fluid">


        <!-- left menu starts -->
        <div class="span2 main-menu-span">
          <div class="well nav-collapse sidebar-nav">
<?php if ($user->isInRole('admin')): ?>
            <ul class="nav nav-tabs nav-stacked main-menu">
              <li class="nav-header hidden-tablet">Main</li>
              <li><a href="<?php echo htmlSpecialChars($_control->link("Dashboard:summary")) ?>
"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
              <li><a href="<?php echo htmlSpecialChars($_control->link("People:")) ?>
"><i class="icon-user"></i><span class="hidden-tablet"> People</span></a></li>
              <li><a href="<?php echo htmlSpecialChars($_control->link("Trainings:")) ?>
"><i class="icon-bullhorn"></i><span class="hidden-tablet"> Trainings</span></a></li>
              <li><a href="<?php echo htmlSpecialChars($_control->link("Course:")) ?>
"><i class="icon-briefcase"></i><span class="hidden-tablet"> Courses</span></a></li>
              <li><a href="<?php echo htmlSpecialChars($_control->link("Protocols:")) ?>
"><i class="icon-file"></i><span class="hidden-tablet"> Protocols</span></a></li>
              <li><a href="<?php echo htmlSpecialChars($_control->link("Fundings:")) ?>
"><i class="icon-gift"></i><span class="hidden-tablet"> Fundings</span></a></li>
              <li><a style="cursor:pointer" onclick="myTour(0)"><i class="icon-globe"></i><span class="hidden-tablet"> Tour</span></a></li>
              </ul>

            <ul class="nav nav-tabs nav-stacked main-menu">
              <li class="nav-header hidden-tablet">System</li>
              <li><a href="<?php echo htmlSpecialChars($_control->link("System:adminAccounts")) ?>
"><i class="icon-lock"></i><span class="hidden-tablet"> Admin Accounts</span></a></li>
            </ul>

<?php endif ?>

<?php if ($user->isInRole('researcher')): ?>            <ul class="nav nav-tabs nav-stacked main-menu">
              <li class="nav-header hidden-tablet">User</li>
              <li><a href="<?php echo htmlSpecialChars($_control->link("User:courses")) ?>
"><i class="icon-briefcase"></i><span class="hidden-tablet"> My Courses</span></a></li>
<?php if ($user->isInRole('pi')): ?>              <li ><a href="<?php echo htmlSpecialChars($_control->link("User:protocols")) ?>
"><i class="icon-file"></i><span class="hidden-tablet"> My Protocols</span></a></li>
<?php endif ?>
            </ul>
<?php endif ?>

<?php if ($user->isInRole('guest')): ?>            <ul class="nav nav-tabs nav-stacked main-menu">
              <li class="nav-header hidden-tablet">Guest</li>
              <li><a href="<?php echo htmlSpecialChars($_control->link("Dashboard:summary")) ?>
"><i class="icon-home"></i><span class="hidden-tablet"> Dashboard</span></a></li>
            </ul>
<?php endif ?>



<!-- GUEST USER NEEDS MENU -->

            
    </div><!--/.well -->
</div><!--/span-->
<!-- left menu ends -->

        <noscript>
        <div class="alert alert-block span10">
          <h4 class="alert-heading">Warning!</h4>
          <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
        </div>
        </noscript>

        <div id="content" class="span10">

          <div>
            <ul class="breadcrumb">
              <li>
                <a href="<?php echo htmlSpecialChars($_control->link($user->identity->defaultPresenter)) ?>
">Home</a>
              </li>
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'breadcrumbs', $template->getParameters()) ?>
            </ul>
          </div>

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
<!-- content ends -->
                        </div><!--/#content.span10-->
                    </div><!--/fluid-row-->

            <!--            <footer>
                <p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Muhammad Usman</a> <?php echo date('Y') ?></p>
                <p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
            </footer> -->
        </div><!--/.fluid-container-->
<?php call_user_func(reset($_l->blocks['scripts']), $_l, get_defined_vars())  ?>
    <img class="ajaxloader" src="<?php echo htmlSpecialChars($basePath) ?>/img/ajax-loaders/ajax-loader-1.gif" style="display:none" />
  </body>
</html>
