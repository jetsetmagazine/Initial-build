<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pinterest Pro</title>
<style type="text/css">

label{
	display:block;
	margin:10px 0px 5px 0px;
	color:#21759B;
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	font-size:13px;
	background:url(../images/mce-gear.png) left center no-repeat;
	line-height:20px;
	padding:0 0 0 24px;
}

.input{
	width:395px;
    background: none repeat scroll 0 0 #F3F3F3;
    border: 1px solid #DDDDDD;
    color: #333333;
    padding: 6px;
	margin:5px 0px 10px 0px;
	font-size:11px;
}

#ltd-insert{
	padding:7px 11px;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
	border-radius: 4px;
	font-weight:bold;
    background: none repeat scroll 0 0 #F3F3F3;
    border: 1px solid #DDDDDD;
    color: #999999 !important;
	font-size:12px;
	cursor:pointer;
}

#ltd-insert:hover{
	border:1px solid #bbbbbb;
	color:#666666 !important;
}

</style>
<link href="../../../../wp-includes/js/thickbox/thickbox.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../../../../wp-includes/js/jquery/jquery.js"></script>
<script language="javascript" src="../../../../wp-includes/js/thickbox/thickbox.js"></script>
<script language="javascript" src="../../../../wp-includes/js/tinymce/tiny_mce_popup.js"></script>
<script language="javascript" src="../../../../wp-includes/js/tinymce/utils/mctabs.js"></script>
<script language="javascript" src="../../../../wp-includes/js/tinymce/utils/form_utils.js"></script>
<script language="javascript" type="text/javascript">

	jQuery(document).ready(function() {
	
		jQuery('#upload_image_button').click(function() {
			 formfield = jQuery('#upload_image').attr('name');
			 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
			 return false;
		});
		
		window.send_to_editor = function(html) {
			 imgurl = jQuery('img',html).attr('src');
			 jQuery('#upload_image').val(imgurl);
			 tb_remove();
		}
	
	});


	// Start TinyMCE
	function init() {
		tinyMCEPopup.resizeToInnerSize();
	}
	
	// Function to add the pinit button to editor
	function pinitButton(){
		
		// Cache our form vars
		var url   	= document.getElementById('pin-url').value;
		var image	= document.getElementById('pin-image').value;
		var counter	= document.getElementById('pin-counter').value;
		var desc	= document.getElementById('pin-desc').value;
		
		// If TinyMCE runable
		if(window.tinyMCE) {
			
			// Get the selected text in the editor
			selected = tinyMCE.activeEditor.selection.getContent();
			
			// Send our modified shortcode to the editor with selected content				
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false,  '[pinterest-pro type="pinit" pin_url="'+url+'" pin_image_url="'+image+'" pin_counter="'+counter+'" pin_desc="'+desc+'"]');

			// Repaints the editor
			tinyMCEPopup.editor.execCommand('mceRepaint');
			
			// Close the TinyMCE popup
			tinyMCEPopup.close();
			
		} // end if
		
		return; // always R E T U R N

	} // end add

	// Function to add the follow button to editor
	function followButton(){
		
		// Cache our form vars
		var name = document.getElementById('follow-name').value;
		var size = document.getElementById('follow-size').value;
		
		// If TinyMCE runable
		if(window.tinyMCE) {
			
			// Get the selected text in the editor
			selected = tinyMCE.activeEditor.selection.getContent();
			
			// Send our modified shortcode to the editor with selected content				
			window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false,  '[pinterest-pro type="follow" follow_name="'+name+'" follow_size="'+size+'"]');

			// Repaints the editor
			tinyMCEPopup.editor.execCommand('mceRepaint');
			
			// Close the TinyMCE popup
			tinyMCEPopup.close();
			
		} // end if
		
		return; // always R E T U R N

	} // end add
	
</script>
</head>

<body>

<div class="tabs">
    <ul>
        <li id="pinit_tab" class="current"><span><a href="javascript:mcTabs.displayTab('pinit_tab','pinit_panel');" onmousedown="return false;">"Pin It" Button</a></span></li>
      <li id="follow_tab" class=""><span><a href="javascript:mcTabs.displayTab('follow_tab','follow_panel');" onmousedown="return false;">Follow Button</a></span></li>
    </ul>
</div>

<div class="panel_wrapper">

    <div id="pinit_panel" class="panel current" style="min-height:400px !important;"><br />
    
        <form method="post" action="" id="pinitform">
                  
          <label>Pin It URL</label>
          <input name="pin-url" id="pin-url" type="text" class="input" />

          <label>Pin Up Image URL</label>
          <input name="pin-image" id="pin-image" type="text" class="input" />
        
          <label>Counter Display</label>
          <select name="pin-counter" id="pin-counter" class="input">
            <option value="none">None</option>
            <option value="horizontal" selected="selected">Bubble / Horizontal</option>
            <option value="vertical">Box / Vertical</option>
          </select>
          
          <label>Optional Description</label>
          <textarea name="pin-desc" id="pin-desc" cols="" rows="3" class="input"></textarea><br />
                    
          <input type="button" id="insert" name="insert" value="{#insert}" onclick="pinitButton();" />
                      
        </form>
            
    </div>

    <div id="follow_panel" class="panel" style="min-height:350px !important;"><br />
    
        <form method="post" action="" id="followform">
                  
          <label>Pinterest Username</label>
          <input name="follow-name" id="follow-name" type="text" class="input" />
        
          <label>Button Size</label>
          <select name="follow-size" id="follow-size" class="input">
            <option value="small">Small (16x16)</option>
            <option value="pill">Pill Button (78x26)</option>
            <option value="medium">&quot;Follow&quot; Button (156x26)</option>
            <option value="box">Box / Large (61x61)</option>
          </select>
                    
          <input type="button" id="insert" name="insert" value="{#insert}" onclick="followButton();" />
                      
        </form>
            
    </div>

</div>

</body>
</html>