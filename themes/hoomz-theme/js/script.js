const tabs = document.querySelector(".wrapper");
const tabButton = document.querySelectorAll(".tab-button");
const contents = document.querySelectorAll(".content");

tabs.onclick = (e) => {
	const id = e.target.dataset.id;

	if (id) {
		// if (id !== "map") {
		// 	let themap = document.querySelector(".themap");
		// 	themap.style.cssText = `display:none`;
		// } else {
		// 	let themap = document.querySelector(".themap");
		// 	themap.style.cssText = `display:block`;
		// }
		tabButton.forEach((btn) => {
			btn.classList.remove("active");
		});
		e.target.classList.add("active");

		contents.forEach((content) => {
			content.classList.remove("active");
		});
		const element = document.getElementById(id);
		element.classList.add("active");
	}
};
