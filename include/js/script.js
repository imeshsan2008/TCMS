let search = window.location.href;
let class_schedule = document.getElementById('class_schedule');
let class_fee = document.getElementById('class_fee');
let exam_result = document.getElementById('exam_result');
let subject = document.getElementById('subject');
let dashboard = document.getElementById('dashboard');
let link = document.getElementById('bread_link');
let h = search.split("/");
let teachers = document.getElementById('teachers');


/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;


for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
if (h[6] == 'students') {
    link.innerHTML='Students';    
    students.classList.add("active");
    }if (h[6] == 'class_schedule') {
        link.innerHTML='Class Schedule';
class_schedule.classList.add("active");
    }
    if (h[6] == 'class_fee') {
        link.innerHTML='Class Fee';
        class_fee.classList.add("active");
    }
    if (h[6] == 'exam_result') {
        link.innerHTML='Exam Result';
        exam_result.classList.add("active");
    }
    if (h[6] == 'subject') {
        link.innerHTML='Subject';
        subject.classList.add("active");
    }
    if (h[6] == 'teachers') {
        link.innerHTML='teachers';
        teachers.classList.add("active");
    }
    if (h[4] == 'dashboard') {
        link.innerHTML='dashboard';
        dashboard.classList.add("active");
    }




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})


