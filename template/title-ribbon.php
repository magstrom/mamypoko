<?php
   require_once($_SERVER['DOCUMENT_ROOT'] . '/function/main.php');
      require_once(getFunctionPath() . '/stickerGroup/stickerGroup.php');
            require_once(getFunctionPath() . '/template/template.php');

   $hostURL = "http://$_SERVER[HTTP_HOST]";
   $actualURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
   if(($actualURL == $hostURL.'/view/dashboard.php')){
      echo "<h2>Dashboard</h2>";
   }
   if(($actualURL == $hostURL.'/view/template.php')){
      echo "<h2>Template</h2>";
   }
   if(($actualURL == $hostURL.'/view/addTemplate.php')){
      echo "<h2>Add Template</h2>";
   }
   if(($actualURL == $hostURL.'/view/layout.php')){
      echo "<h2>Layout</h2>";
   }
   if(($actualURL == $hostURL.'/view/addLayout.php')){
      echo "<h2>Add Layout</h2>";
   }

   $url1 = parse_url($actualURL);

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
   // if($url1['path'] == $urlDashboard['path']){
   //    echo "<h2>Dashboard</h2>";
   // }
   if($url1['path'] == $urlStickerGroup['path']){
      echo "<h2>Sticker Group</h2>";
   }
      if($url1['path'] == $urlAStickerGroup['path']){
         echo "<h2>Add Sticker Group</h2>";
      }
      if($url1['path'] == $urlEStickerGroup['path']){
         echo "<h2>Edit Sticker Group</h2>";
      }
   if($url1['path'] == $urlSticker['path']){
                     if (isset($_GET['id'])) {
                     $id = $_GET['id'];
                     }
                  $sticker = getStickerGroupDetail($id);
                  $stickerGroupName = $sticker['name'];
      echo "<h2>Sticker ".$stickerGroupName." </h2>";
   }
      if($url1['path'] == $urlASticker['path']){
      echo "<h2>Add Sticker </h2>";
      }
      if($url1['path'] == $urlESticker['path']){
      echo "<h2>Edit Sticker </h2>";
      }

   if($url1['path'] == $urlETemplate['path']){
         echo "<h2>Edit Template</h2>";
      }
   if($url1['path'] == $urlLayout['path']){
                           if (isset($_GET['id'])) {
                     $id = $_GET['id'];
                     }
                  $temp = getTemplateDetail($id);
                  $tempName = $temp['name'];
      echo "<h2>Layout ".$tempName."</h2>";
   }
      if($url1['path'] == $urlALayout['path']){
         echo "<h2>Add Layout</h2>";
      }
      if($url1['path'] == $urlELayout['path']){
         echo "<h2>Edit Layout</h2>";
      }

   if($url1['path'] == $urlBadge['path']){
      echo "<h2>Badge</h2>";
   }
      if($url1['path'] == $urlABadge['path']){
         echo "<h2>Add Badge</h2>";
      }
      if($url1['path'] == $urlEBadge['path']){
         echo "<h2>Edit Badge</h2>";
      }


   if($url1['path'] == $urlEmoji['path']){
      echo "<h2>Emoji</h2>";
   }
      if($url1['path'] == $urlAEmoji['path']){
         echo "<h2>Add Emoji</h2>";
      }
      if($url1['path'] == $urlEEmoji['path']){
         echo "<h2>Edit Emoji</h2>";
      }

   if($url1['path'] == $urlNews['path']){
      echo "<h2>News</h2>";
   }
      if($url1['path'] == $urlANews['path']){
      echo "<h2>Add News</h2>";
      }
      if($url1['path'] == $urlENews['path']){
      echo "<h2>Edit News</h2>";
      }

   if($url1['path'] == $urlFAQ['path']){
      echo "<h2>Frequently Asked Question</h2>";
   }
      if($url1['path'] == $urlAFAQ['path']){
      echo "<h2>Add Frequently Asked Question</h2>";
      }
      if($url1['path'] == $urlEFAQ['path']){
      echo "<h2>Edit Frequently Asked Question</h2>";
      }

   if($url1['path'] == $urlLocation['path']){
      echo "<h2>Geo Location</h2>";
   }
   if($url1['path'] == $urlTop['path']){
      echo "<h2>Top User</h2>";
   }
?>