
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});



function Checkboxes() {
	//collects all checked boxes and put them as value in a hidden input to send to server, on server side split value into array (splitter: Comma)
	var cbs = document.getElementsByName('del');

	if (cbs) {
		var value = [];

		for (var i = 0 ; i < cbs.length; i++) {
			if (cbs[i].checked) {
				value.push(cbs[i]);
			}
		}

		var cbArray = document.getElementById('checkbox-array');
		var val = [];
		for (var i = 0 ; i < value.length; i++) {
			val.push(value[i].id)
		}

		if(cbArray){
			cbArray.value = val;
		}
	}
}

function CheckAllBoxes(){
	var allCheckbox   = document.getElementById("del-all");
	var cbs = document.getElementsByName('del');

	if (allCheckbox.checked) {
		for (var i = 0 ; i < cbs.length; i++) {
			cbs[i].checked = true;
		}
	}
	else{
		for (var i = 0 ; i < cbs.length; i++) {
			cbs[i].checked = false;
		}
	}
	Checkboxes();
}


function eventHandler(){
	var cbs = document.getElementsByName('del');

	for (var i = 0 ; i < cbs.length; i++) {
		cbs[i].addEventListener("click", Checkboxes);
	}

	var allCheckbox   = document.getElementById("del-all");
	allCheckbox.addEventListener("click", CheckAllBoxes);
}

eventHandler();