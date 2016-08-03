<script>
// 댓글 수정
var isUpdateReplyMod = false;
var tempForm;
var tempButton;
var tempContent;
function updateReply(button, replyId) {
	if (isUpdateReplyMod == false) {
		tempForm = document.getElementById(replyId);
		tempContent = tempForm.content.innerHTML;
		tempForm.content.readOnly = false;
		tempForm.content.style.border = "1px solid #ddd";
		tempForm.submit.type = 'submit';
		isUpdateReplyMod = true;
		tempButton = button;
		tempButton.value = '취소';
	} else {
		// alert(tempContent);
		tempForm.content.value = tempContent;
		tempForm.content.readOnly = true;
		tempForm.content.style.border = "0px";
		tempForm.submit.type = 'hidden';
		isUpdateReplyMod = false;
		tempButton.value = '수정';
	}
	return false;
}
function deleteReply(form) {
	if (confirm('댓글을 삭제하시겠습니까?')) {
		form.submit();
		return true;
	} else {
		return false;
	}
}

// 댓글 더보기
var currentDisplayedReplies = 0;
var replyBlockSize = 5;
function showMoreReplies(totalReplies, button) {
	var nextDisplayedReplies = Math.min(currentDisplayedReplies + replyBlockSize, totalReplies);
	
	for (var row = 0; row < totalReplies; row++) {
		var element = document.getElementById('reply_row_' + row);
		if (row < nextDisplayedReplies) {
			element.style.display = '';
		} else {
			element.style.display = 'none';
		}
	}
	
	currentDisplayedReplies = nextDisplayedReplies;
	if (nextDisplayedReplies === totalReplies) {
		button.style.display = 'none';
	}
}
</script>

<div>
	<ul class="comment_list">
<?php
	$query = sprintf("SELECT * FROM comment WHERE post_id=%d;", $post_id);
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die ("comment load failed: ".mysqli_error());
	}
	
	$row_num = 0;
	while ($row = mysqli_fetch_assoc($result)) {
?>
	<li id="reply_row_<?php echo $row_num; $row_num += 1; ?>" class="clearfix comment_line">
		<ul>
			<li>
		<?php
		if ($row['member_id'] !== NULL) {
			$comment_member = get_member_name($conn, $row['member_id']);
			printf("<span>%s</span>", htmlspecialchars($comment_member));
			printf("<span class='date'>%s</span>", time_set($row['date']));
			if (check_login()) {
				if ($comment_member == $_SESSION['id']) {
		?>
			<span class="floatright">
				<span class="floatleft">
					<input type="button" value="수정" onclick="updateReply(this, '<?php echo 'form_'.$row['id']; ?>');">
				</span>
				<span class="floatleft">
					<form action="comment_del.php" method="post">
						<input type="hidden" name="board_id" value="<?php echo $board_id; ?>">
						<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
						<input type="hidden" name="comment_id" value="<?php echo $row['id']; ?>">
						<input type="button" value="삭제" onclick="deleteReply(this.form);">
					</form>
				</span>
		<?php
					// printf('<a href="comment_update.php?%s&cmt_id=%d">수정</a>',$temp, $row['id']);
					// printf('<a href="comment_del.php?%s&cmt_id=%d">삭제</a>',$temp, $row['id']);
		?>
			</span>
		<?php
				}
			}
		} else {
			printf("<span>%s</span>", htmlspecialchars($row['author']));
			printf("<span class='date'>%s</span>", time_set($row['date']));
		?>
			<span class="floatright">
				<span class="floatleft">
					<input type="button" value="수정" onclick="updateReply(this, '<?php echo 'form_'.$row['id']; ?>');">
				</span>
				<span class="floatleft">
					<form action="comment_del.php" method="post">
						<input type="hidden" name="comment_id" value="<?php echo $row['id']; ?>">
						<input type="button" value="삭제" onclick="deleteReply(this.form);">
					</form>
				</span>
		<?php
			// printf('<a href="comment_update.php?%s&cmt_id=%d">수정</a>',$temp, $row['id']);
			// printf('<a href="comment_del.php?%s&cmt_id=%d">삭제</a>', $temp, $row['id']);
		?>
			</span>
		<?php
		}
		?>
			</li>
			<li class="comment">
			<form id="form_<?php echo $row['id']; ?>" action="comment_update_db.php" method="post">
				<input type="hidden" name="comment_id" value="<?php echo $row['id']; ?>">
				<textarea maxlength="400" name="content" readonly><?php echo htmlspecialchars($row['content']); ?></textarea>
				<input type="hidden" name="submit" value="수정완료">
			</form>
			</li>
		</ul>
	</li>
<?php
	}
?>
	</ul>
	<input type="button" id="show_more_reply_button" value="댓글 더보기" onclick="showMoreReplies(<?php echo $row_num; ?>, this);">
	<script>showMoreReplies(<?php echo $row_num; ?>, document.getElementById('show_more_reply_button'));</script>
</div>

<form action="comment_db.php" method="post">
<ul class="comment_write">
	<li>
		<input type="hidden" name="board_id" value="<?php echo $board_id; ?>" readonly>
		<input type="hidden" name="post_id" value="<?php echo $post_id; ?>" readonly>
	</li>
	<li>
		<label>comment</label>
	</li>
	<?php
		if (!check_login()) {
	?>
	<li>
		<input type="text" name="author" value="author" onfocus="if(this.value =='author') { this.value=''; }" onblur="if(this.value =='') { this.value='author'; }">
	</li>
	<?php
		}
		//id='comment_'.$row['id'];
	?>
	<li class="cmt floatleft">
		<textarea maxlength="400" name="content"></textarea>
	</li>
	<li class="floatright">
		<input type="submit" value="작성">
	</li>
</ul>
</form>