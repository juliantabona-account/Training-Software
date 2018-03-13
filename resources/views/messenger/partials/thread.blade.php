<?php 

    $class = $thread->isUnread(Auth::id()) ? 'alert-info' : ''; 
    $unreadCount = $thread->userUnreadMessagesCount(Auth::id()) ? '('.$thread->userUnreadMessagesCount(Auth::id()).')': ''

?>

