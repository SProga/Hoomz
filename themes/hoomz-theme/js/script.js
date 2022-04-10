jQuery(document).ready(function ($) {
	const tabs = document.querySelector(".wrapper");
	const tabButton = document.querySelectorAll(".tab-button");
	const contents = document.querySelectorAll(".content");
	const image_dir =
		window.location.href + "/wp-content/themes/hoomz-theme/images/";
	const heroImages = ["hero.png", "Indoor.png", "Indoor-2.png"];
	const $bin_filter = $(".search-filter");
	const $type = $(".search-type");
	let username = $("[name='username']");
	let password = $("[name='password']");
	username.data("error", false);
	password.data("error", false);

	console.log($bin_filter);

	$($bin_filter).on("click", function () {
		$($bin_filter).removeClass("filter-active");
		$(this).addClass("filter-active");
		var choice = $(this).data("type");
		$($type).val(choice);
	});

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

	$(".btn--signin").on("click", getInputs.bind(null, true));

	$(username)
		.add(password)
		.on("focusin", function () {
			$(this).next(".error").data("error", false);
			$(this).next(".error").remove();
		});
	$(username).add(password).on("focusout", getInputs);

	function getInputs(clicked = null) {
		if (username.val().trim() == "") {
			username
				.parent()
				.append(`<span class="error">username cannot be empty</span>`);
			return;
		}
		if (password.val().trim() == "") {
			password
				.parent()
				.append(`<span class="error">password cannot be empty</span>`);
			return;
		}
		if (clicked) {
			$(".form__signup").submit();
		}
	}

	// function getInputs(e) {
	// 	let type = $("[name='type']").val();
	// 	let category = $("[name='category']").val();
	// 	let price = $("[name='price']").val();
	// 	let location = $("[name='location']").val();

	// 	let url =
	// 		hoomzData.root_url +
	// 		`/wp-json/hoomz/v1/homes?type=${type}&category=${category}&price=${price}&location=${location}`;

	// 	$.getJSON(url, (results) => {
	// 		console.log(results);
	// 	});
	// 	// e.preventDefault();
	// 	// let form = $(".form__filter");
	// } // console.dir(form);
});
