<?php

/**
 * @file
 * Default view template to display a item in an RSS feed.
 *
 * @ingroup views_templates
 */
 
 //$description = str_replace("&amp;#", "&#", $description);
 /* $description = htmlspecialchars_decode(trim(strip_tags(decode_entities( $description)),"\n\t\r\v\0\x0B\xC2\xA0 "));
  $description = htmlspecialchars($description, ENT_COMPAT);
  $description = html_entity_decode($description, ENT_QUOTES | ENT_HTML5)*/
?>
  <item>
    <title><![CDATA[<?php print $title; ?>]]></title>
    <link><?php print $link; ?></link>
    <description><?php print $description; ?></description>
    <?php print $item_elements; ?>
  </item>