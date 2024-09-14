	document.addEventListener("DOMContentLoaded", function() {
	var container = document.querySelectorAll('.uk-section ');


	const readingTimeSummary = document.querySelector("#readingtime");
	const avgWordsPerMin = 250;

	function totalWords(container) {
	var total = 0;
	for (var i = 0; i < container.length; i++) {
	total += container[i].innerText.split(' ').length;
}
	return total;
}

	function setReadingTime() {
	let count = totalWords(container);

	let time = Math.ceil(count / avgWordsPerMin);
	readingTimeSummary.innerText = time;
}

	setReadingTime();

});

