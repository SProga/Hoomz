jQuery(document).ready(function ($) {
	const tabs = document.querySelector(".wrapper");
	const tabButton = document.querySelectorAll(".tab-button");
	const contents = document.querySelectorAll(".content");
	const image_dir =
		window.location.href + "/wp-content/themes/hoomz-theme/images/";
	const heroImages = ["hero.png", "Indoor.png", "Indoor-2.png"];

	var i = 0;
	setInterval(() => {
		i = (i + 1) % heroImages.length;
		$(".hero")
			.css({
				"background-image": `url(${image_dir}/${heroImages[i]})`,
				opacity: "0.7",
			})
			.animate({ opacity: 1 });
	}, 10000);

	if (tabs) {
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
	}

	let btn = $(".btn--submit").on("click", getInputs);

	function getInputs(e) {
		let type = $("[name='type']").val();
		let category = $("[name='category'").val();
		let price = $("[name='price']").val();
		let location = $("[name='location'").val();
		let data = {
			type,
			category,
			price,
			location,
		};

		console.log("send", data);

		let url = hoomzData.root_url + "/wp-json/hoomz/v1/search";

		fetch(url, {
			method: "GET",
			data,
		})
			.then((res) => res.json())
			.then((res) => console.log(res));
		// e.preventDefault();
		// let form = $(".form__filter");
		// console.dir(form);
	}
});
