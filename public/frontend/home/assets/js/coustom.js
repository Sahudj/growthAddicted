AOS.init();
var windowWidth = window.innerWidth;

$(document).ready(function () {
    var navbar = $('#navbar');
    var bottombuybtn = $('#bbnb');
    var lastScrollTop = 0;
    var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    console.log("ISIOS", isIOS);
    if (!isIOS) {
        $(window).scroll(function () {

            var scrollTop = $(this).scrollTop();


            if (scrollTop > lastScrollTop) {

                navbar.css('top', -navbar.outerHeight());
            } else {

                navbar.css('top', 0);
            }

            lastScrollTop = scrollTop;
        });
    }


    $(window).scroll(function () {
        if ($(window).scrollTop() >= 80) {
            navbar.addClass('scrolled');
            bottombuybtn.addClass('scrolled');
        } else {
            navbar.removeClass('scrolled');
            bottombuybtn.removeClass('scrolled');

        }
    });
});

var swiper = new Swiper(".mySwiper", {
    slidesPerView: windowWidth <= 960 ? 1 : 3,
    spaceBetween: 30,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    loop: true
});

document.addEventListener('DOMContentLoaded', function () {
    // Define an array to hold all the target elements and their animations
    const targets = [{
        id: 'whygrthaddicted',
        animations: [{
            id: 'animval1',
            start: 0,
            end: 100
        },
        {
            id: 'animval2',
            start: 0,
            end: 200
        },
        {
            id: 'animval3',
            start: 0,
            end: 25
        }
        ]
    },
    {
        id: 'alsc',
        animations: [{
            id: 'alsc1',
            start: 0,
            end: 5
        },
        {
            id: 'alsc2',
            start: 0,
            end: 25
        },
        {
            id: 'alsc3',
            start: 0,
            end: 100
        }
        ]
    },
    {
        id: 'dses',
        animations: [{
            id: 'dses1',
            start: 0,
            end: 4
        },
        {
            id: 'dses2',
            start: 0,
            end: 25
        },
        {
            id: 'dses3',
            start: 0,
            end: 100
        }
        ]
    },
    {
        id: 'pesc',
        animations: [{
            id: 'pesc1',
            start: 0,
            end: 6
        },
        {
            id: 'pesc2',
            start: 0,
            end: 25
        },
        {
            id: 'pesc3',
            start: 0,
            end: 100
        }
        ]
    },
    {
        id: 'iesc',
        animations: [{
            id: 'iesc1',
            start: 0,
            end: 10
        },
        {
            id: 'iesc2',
            start: 0,
            end: 25
        },
        {
            id: 'iesc3',
            start: 0,
            end: 100
        }
        ]
    }
    ];

    // Create a single Intersection Observer to handle all targets
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            const target = targets.find(t => t.id === entry.target.id);
            if (entry.isIntersecting && target) {
                // If the div is in the viewport, add animations
                target.animations.forEach(animation => {
                    animateValue(document.getElementById(animation.id), animation.start, animation.end, 1000);
                });
                // Add any other animations or modifications as needed
            }
        });
    }, {
        // Set the root to 'null' for the viewport
        root: null,
        // Set a threshold for when the callback should be triggered
        threshold: 0.5
    });

    // Start observing each target element if it exists
    targets.forEach(target => {
        const animatedDiv = document.getElementById(target.id);
        if (animatedDiv) {
            observer.observe(animatedDiv);
        } else {
            console.error(`Target element with ID '${target.id}' not found.`);
        }
    });
});

function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        obj.innerHTML = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}
const obj = document.getElementById("value");

var testiCrousal = new Swiper(".testimonial-crousal", {
    direction: "horizontal",
    autoplay: {
        delay: 5000,
        disableOnInteraction: windowWidth <= 960 ? false : true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    observer: true,
    observeParents: true,
    loop: true,
    slidesPerView: 1,
    spaceBetween: 60,
    centeredSlides: true,
});

$("#playBtnmodal").on("click", function (e) {
    var wrapper = $("#video-modal");
    var href = $(this).attr("href");
    var customFrame = '<iframe src=' + href + ' width="100%" height="100%" frameborder="0" scrolling="no" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    $(wrapper).append(customFrame);
    $('.modal').show();
    e.preventDefault();
});
$("#modalClose").on("click", function (e) {
    var wrapper = $("#video-modal");
    $(wrapper).html('');
    $('.modal').hide();
    e.preventDefault();
});
// Side Bar 
$("#sdbaropenbtn").on("click", function (e) {
    var sideBar = $("#navsidebar");
    sideBar.addClass('open');
    e.preventDefault();
});
$("#clsbtn").on("click", function (e) {
    var sideBar = $("#navsidebar");
    sideBar.removeClass('open');
    e.preventDefault();
});
$("#navsidebar > .menu > .list > a").on("click", function (e) {
    var sideBar = $("#navsidebar");
    sideBar.removeClass('open');
});


$("#v-play-btn").on("click", function (e) {
    var vidWrap = $(".video-box");
    var customFrame = '<iframe src=' + 'https://www.youtube.com/embed/CTUd15B5rGc?si=BJISJXGYcQXGNvSf' + ' width="100%" height="100%" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>';
    $('.v-section-right').addClass('open');
    $(vidWrap).append(customFrame);
    $('#v-close-btn').show();
    $('#v-play-btn').hide();
    e.preventDefault();
});

$("#v-close-btn").on("click", function (e) {
    var vidWrap = $(".video-box");
    $('.v-section-right').removeClass('open');
    $(vidWrap).html('');
    $('#v-close-btn').hide();
    $('#v-play-btn').show();
    e.preventDefault();
});

$("#madhu").on("click", function (e) {
    e.preventDefault(); // Prevent the default behavior of the link

    var wrapper = $("#video-modal");
    var href = $(this).attr("href");

    // Embed YouTube video URL with autoplay
    var videoUrl = "https://www.youtube.com/embed/dH5GnjVT7Lc?si=-xJinpQZUYQFsiaB";

    // Create an iframe element with the YouTube video URL
    var customFrame = '<iframe width="100%" height="100%" src="' + videoUrl + '" frameborder="0" allowfullscreen></iframe>';

    // Append the iframe to the modal wrapper
    $(wrapper).html(customFrame);

    // Show the modal
    $('.modal').show();
});
$("#sanchi").on("click", function (e) {
    e.preventDefault(); // Prevent the default behavior of the link

    var wrapper = $("#video-modal");
    var href = $(this).attr("href");

    // Embed YouTube video URL with autoplay
    var videoUrl = "https://www.youtube.com/embed/epiLga8m36M?si=CQFxNm2fMHBnUGwQ";

    // Create an iframe element with the YouTube video URL
    var customFrame = '<iframe width="100%" height="100%" src="' + videoUrl + '" frameborder="0" allowfullscreen></iframe>';

    // Append the iframe to the modal wrapper
    $(wrapper).html(customFrame);

    // Show the modal
    $('.modal').show();
});

// Add another event handler to close the modal
$("#close-modal-btn").on("click", function (e) {
    var wrapper = $("#video-modal");
    $(wrapper).html(''); // Remove the iframe content
    $('.modal').hide(); // Hide the modal
});