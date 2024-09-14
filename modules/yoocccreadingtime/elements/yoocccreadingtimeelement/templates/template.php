<?php

$el = $this->el('div', [
    'class' => '',
]);

// Content
$content = $this->el('div', [
    'class' => ['el-content'],
]);
?>


<?= $el($props, $attrs) ?>

<p><span id="readingtime"></span> min.</p>

<?= $el->end() ?>

<?php
$type = $props['type'];
$cssselector = $props['cssselector'];
$content = $props['content'];
// count words in $content
function countWords($content)
{
	$wordCount = str_word_count(strip_tags($content));
	return $wordCount;
}
?>



<script>
	document.addEventListener("DOMContentLoaded", function() {
		const readingTimeSummary = document.querySelector("#readingtime");
		const avgWordsPerMin = 250;
		let totalWordsCount = 0;

		<?php if ($type == 'content'): ?>
		totalWordsCount = <?php echo countWords($content); ?>;
		<?php else: ?>
		const container = document.querySelectorAll('<?php echo $cssselector; ?>');
		container.forEach(element => {
			totalWordsCount += element.innerText.split(' ').length;
		});
		<?php endif; ?>

		function setReadingTime() {
			let time = Math.ceil(totalWordsCount / avgWordsPerMin);
			readingTimeSummary.innerText = time;
		}

		setReadingTime();
	});
</script>
