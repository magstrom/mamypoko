<?php 
   require_once(getFunctionPath() . '/template/template.php'); 
   $hostURL = "http://$_SERVER[HTTP_HOST]";
   $actualURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

   $urlActual = parse_url($actualURL);
   $urlDashboard = parse_url('/view/dashboard.php');
   // if($url1['path'] == $urlCA['path']){
   $urlStickerGroup = parse_url('/view/stickerGroup.php');
   $urlAStickerGroup = parse_url('/view/addStickerGroup.php');
   $urlEStickerGroup = parse_url('/view/editStickerGroup.php');

   $urlSticker = parse_url('/view/sticker.php');
   $urlASticker = parse_url('/view/addSticker.php');
   $urlESticker = parse_url('/view/editSticker.php');


   $urlETemplate = parse_url('/view/editTemplate.php');

   $urlLayout = parse_url('/view/layout.php');
   $urlALayout = parse_url('/view/addLayout.php');
   $urlELayout = parse_url('/view/editLayout.php');

   $urlBadge = parse_url('/view/badge.php');
   $urlABadge = parse_url('/view/addBadge.php');
   $urlEBadge = parse_url('/view/editBadge.php');

   $urlEmoji = parse_url('/view/emoji.php');
   $urlAEmoji = parse_url('/view/addEmoji.php');
   $urlEEmoji = parse_url('/view/editEmoji.php');

   $urlNews = parse_url('/view/news.php');
   $urlANews = parse_url('/view/addNews.php');
   $urlENews = parse_url('/view/editNews.php');

   $urlFAQ = parse_url('/view/faq.php');
   $urlAFAQ = parse_url('/view/addFaq.php');
   $urlEFAQ = parse_url('/view/editFaq.php');

   $urlLocation = parse_url('/view/location.php');
   $urlTop = parse_url('/view/topuser.php');
?>

<ol class="breadcrumb">
   <li><a href="<?php echo $hostURL.'/view/dashboard.php';?>">Home</a></li>
<?php
   if(($actualURL == $hostURL.'/view/addTemplate.php')){ ?>
   <li><a href='<?php echo $hostURL.'/view/template.php';?>'>Template</a></li>
<?php } 
   if(($actualURL == $hostURL.'/view/layout.php')){ ?>
   <li><a href='<?php echo $hostURL.'/view/template.php';?>'>Template</a></li>
<?php } 
   if(($actualURL == $hostURL.'/view/addLayout.php')){ ?>
      <li><a href='<?php echo $hostURL.'/view/layout.php';?>'>Layout</a></li>
<?php } 
if(($actualURL == $hostURL.'/view/addStickerGroup.php')){ ?>
      <li><a href='<?php echo $hostURL.'/view/stickerGroup.php';?>'>Sticker Group</a></li>
<?php }
if(($urlActual['path'] == $urlEStickerGroup['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/stickerGroup.php';?>'>Sticker Group</a></li>
<?php }
if(($urlActual['path'] == $urlSticker['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/stickerGroup.php';?>'>Sticker Group</a></li>
<?php }
if(($urlActual['path'] == $urlESticker['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/stickerGroup.php';?>'>Sticker Group</a></li>
<?php }
if(($urlActual['path'] == $urlASticker['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/stickerGroup.php';?>'>Sticker Group</a></li>
<?php }
if(($urlActual['path'] == $urlLayout['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/template.php';?>'>Template</a></li>
<?php }
if(($urlActual['path'] == $urlALayout['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/template.php';?>'>Template</a></li>
<?php }
if(($urlActual['path'] == $urlELayout['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/template.php';?>'>Template</a></li>
<?php }
if(($urlActual['path'] == $urlEBadge['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/badge.php';?>'>Badge</a></li>
<?php }
if(($actualURL == $hostURL.'/view/addBadge.php')){ ?>
      <li><a href='<?php echo $hostURL.'/view/badge.php';?>'>Badge</a></li>
<?php } 
if(($urlActual['path'] == $urlEEmoji['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/emoji.php';?>'>Emoji</a></li>
<?php }
if(($actualURL == $hostURL.'/view/addEmoji.php')){ ?>
      <li><a href='<?php echo $hostURL.'/view/emoji.php';?>'>Emoji</a></li>
<?php } 
if(($urlActual['path'] == $urlENews['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/news.php';?>'>News</a></li>
<?php }
if(($actualURL == $hostURL.'/view/addNews.php')){ ?>
      <li><a href='<?php echo $hostURL.'/view/news.php';?>'>News</a></li>
<?php } 
if(($urlActual['path'] == $urlEFAQ['path'])){ ?>
      <li><a href='<?php echo $hostURL.'/view/faq.php';?>'>FAQ</a></li>
<?php }
if(($actualURL == $hostURL.'/view/addFaq.php')){ ?>
      <li><a href='<?php echo $hostURL.'/view/faq.php';?>'>FAQ</a></li>
<?php } ?>
   <li>
   <?php 
      if(($actualURL == $hostURL.'/view/dashboard.php')){
         echo "Dashboard";
      }
      if(($actualURL == $hostURL.'/view/topuser.php')){
         echo "Top User";
      }
      if(($actualURL == $hostURL.'/view/location.php')){
         echo "User Location";
      }
      if(($actualURL == $hostURL.'/view/template.php')){
         echo "Template";
      }
      if(($actualURL == $hostURL.'/view/stickerGroup.php')){
         echo "Sticker Group";
      }
      if(($urlActual['path'] == $urlSticker['path'])){
         echo "Sticker";
      }
      if(($urlActual['path'] == $urlEStickerGroup['path'])){
         echo "Edit Sticker Group";
      }
      if(($actualURL == $hostURL.'/view/addStickerGroup.php')){
         echo "Add Sticker Group";
      }
      if(($urlActual['path'] == $urlASticker['path'])){
         echo "Add New Sticker";
      }
      if(($urlActual['path'] == $urlESticker['path'])){
         echo "Edit Sticker";
      }
      if(($urlActual['path'] == $urlLayout['path'])){
         echo "Layout";
      }
      if(($urlActual['path'] == $urlALayout['path'])){
         echo "Add Layout";
      }
      if(($urlActual['path'] == $urlELayout['path'])){
         echo "Edit Layout";
      }
      if(($urlActual['path'] == $urlEBadge['path'])){
         echo "Edit Badge";
      }
      if(($actualURL == $hostURL.'/view/badge.php')){
         echo "Badge";
      }
      if(($actualURL == $hostURL.'/view/addBadge.php')){
         echo "Add Badge";
      }
      if(($urlActual['path'] == $urlEEmoji['path'])){
         echo "Edit Emoji";
      }
      if(($actualURL == $hostURL.'/view/emoji.php')){
         echo "Emoji";
      }
      if(($actualURL == $hostURL.'/view/addEmoji.php')){
         echo "Add Emoji";
      }
      if(($urlActual['path'] == $urlENews['path'])){
         echo "Edit News";
      }
      if(($actualURL == $hostURL.'/view/news.php')){
         echo "News";
      }
      if(($actualURL == $hostURL.'/view/addNews.php')){
         echo "Add News";
      }
      if(($urlActual['path'] == $urlEFAQ['path'])){
         echo "Edit FAQ";
      }
      if(($actualURL == $hostURL.'/view/faq.php')){
         echo "FAQ";
      }
      if(($actualURL == $hostURL.'/view/addFaq.php')){
         echo "Add FAQ";
      }
      if(($actualURL == $hostURL.'/view/addTemplate.php')){
         echo "Add Template";
      }
      
      
   ?>
   </li>
</ol>
