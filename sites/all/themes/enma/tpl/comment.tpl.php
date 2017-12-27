<?php
  $user = user_load($comment->uid); // Make sure the user object is fully loaded
  $display_name = field_get_items('user', $user, 'field_display_name');
?>
<li id="comment-<?php print $node->nid; ?>" class="comment" >
  <div class="comment-body">
    <?php if($picture){
      print $picture;
    }
    ?>
    <div class="comment-content">
      <span class="comment-author">
        <?php if($display_name[0]['value'] != '') {print  $display_name[0]['value'] ;} else
        print theme('username', array('account' => $content['comment_body']['#object'], 'attributes' => array('class' => 'url'))) ?>
      </span>
      <span><a href="#"><?php print format_date($node->created, 'custom', 'F d, Y g:i a'); ?></a></span>
      <p><?php hide($content['links']); print render($content) ?></p>
      <?php print render($content['links']) ?>
    </div>
  </div>
</li>