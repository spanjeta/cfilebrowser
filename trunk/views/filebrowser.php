<?php

/**
 * This file will render the file browser elements
 * on the page
 */


?>

<div id="<?php echo $this->containerID; ?>"></div>

<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function($) {
	$('#<?php echo $this->containerID; ?>').fileTree({
		root:'<?php echo $this->root; ?>',
		script:'<?php echo $script; ?>',
		folderEvent:'<?php echo $this->folderEvent; ?>',
		expandSpeed:<?php echo $this->expandSpeed; ?>,
		collapseSpeed:<?php echo $this->collapseSpeed; ?>,
		multiFolder:<?php echo $this->multiFolder ? 'true' : 'false'; ?>,
		loadMessage:'<?php echo $this->loadMessage; ?>',
		expandEasing:'<?php echo $this->expandEasing; ?>',
		collapseEasing:'<?php echo $this->collapseEasing; ?>'
	}, function(f){
		<?php if(empty($this->callbackFunction)) : ?>
		alert(f);
		<?php else : ?>
		<?php echo $this->callbackFunction; ?>(f);
		<?php endif; ?>
	});
});
//]]>>
</script>