var sld = 2;
var def_ind = 0;
var timer = new Timer(function() {change_index(1);}, 15000);

function Timer(fn, t) {
    var timerObj = setInterval(fn, t);

    this.stop = function() {
        if (timerObj) {
            clearInterval(timerObj);
            timerObj = null;
        }
        return this;
    }

    // start timer using current settings (if it's not already running)
    this.start = function() {
        if (!timerObj) {
            this.stop();
            timerObj = setInterval(fn, t);
        }
        return this;
    }

    // start with new interval, stop current interval
    this.reset = function(newT) {
        t = newT;
        return this.stop().start();
    }
}

document.getElementById("lt_body_slide_003").onmousedown = function(){timer.stop()};
document.getElementById("lt_body_slide_003").onmouseout = function(){timer.start()};

function startup() {
	timer.reset(5000);
}

function ind_startup() {
	window.location = "http://www.lifeteaches.org/lt_home.php";
}

function change_index(ind) {
	def_ind += ind;
	if (def_ind<0) {def_ind=sld;}
	if (def_ind>sld) {def_ind=0;}
	change_slide(def_ind);
}

function change_slide(ind) {
	timer.reset(5000);
	slides = document.getElementsByClassName("lt_body_item");
	slide_cntrl = document.getElementsByClassName("lt_body_slide_control");
	for (i = 1; i < slide_cntrl.length-1; i++) {
		slide_cntrl[i].className = "lt_body_slide_control";
	}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.opacity = 0;
	}
	slides[ind].style.opacity = 1;
	slide_cntrl[ind+1].className += " lt_body_slide_active";
	def_ind=ind;
	
}

