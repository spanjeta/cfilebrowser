# CFileBrowserWidget #
This is a widget for use within the Yii PHP framework. It uses the [jQuery File Tree](http://abeautifulsite.net/blog/2008/03/jquery-file-tree/) plugin to render the file browser.

<img src='http://www.kevinbradwick.co.uk/assets/cfilebrowser-thumbnail.png' alt='CFileBrowserWidget example' />

## Installation & Usage ##

<p>The widget relises on a 'connector' that gets called via AJAX requests to display a folders contents. You can cut and paste the code in the <strong>ControllerActionSample</strong> file located in the extensions' folder into the controller of your choice.</p>

<p>You can then call the widget like this...</p>
```
<?php $this->widget('application.extensions.cfilebrowser.CFileBrowserWidget',array(
		'script'=>array('site/filebrowser'),
		'root'=>'/var/',
		'folderEvent'=>'click',
		'expandSpeed'=>1000,
		'collapseSpeed'=>1000,
		'multiFolder'=>true,
		'loadMessage'=>'File Browser Is Loading...hang on a sec',
		'callbackFunction'=>'alert("I selected " + f)'
)); ?>
```

### Options ###
<ul>
<blockquote><li><strong>script</strong> - (required) The connector. You must specify as an array e.g. 'array("site/filebrowser")'</li>
<li><strong>root</strong> -  The location to start from (default:  '/')</li>
<li><strong>folderEvent</strong> - The event to expand a folder (default: 'click')</li>
<li><strong>expandSpeed</strong> - Time in miliseconds (default: 500)</li>
<li><strong>collapseSpeed</strong> - Time in miliseconds (default: 500)</li>
<li><strong>callbackMethod</strong> - Where 'f' is the file selected</li>
<li><strong>expandEasing</strong> - (optional)The easing method</li>
<li><strong>collapseEasing</strong> - (optional) The easing method</li>
<li><strong>loadMessage</strong> - (optional) Specify your own message</li>
<li><strong>containerID</strong> - (optional) Specify your own div id (default: 'filebrowser')</li>
<li><strong>cssFile</strong> - (optional) Specify your own CSS file or set as false for none</li>
</ul>