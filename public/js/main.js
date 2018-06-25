$(function () {
    
        function checkIfAngularLoaded() {
            if ($('#hobbies-container').length === 0) {
                setTimeout(function () {
                    checkIfAngularLoaded();
                }, 1000);
            }
            else {
                setTimeout(function () {
                    loadJquery();
                }, 1000);
            }
        }
    
        checkIfAngularLoaded();
    
        function loadJquery() {
            var body = $('body');
            ; var header = $('header');
            var home = $('#home');
            var navList = $('#nav-list');
            var logoContainer = $('#logo-container p');
            var smallMenu = $('#small-menu-container i');
            var skills = $('#competencias');
            var about = $('#sobre');
            var hobbiesContainer = $('#hobbies-container');
            var hobbiesLoader = $('#hobbies-loader');
            var headerEndPos = header.offset().top + header.outerHeight();
            var homeEndPos = home.offset().top + header.outerHeight();
            var skillsPos = skills.offset().top;
            var aboutPos = about.offset().top;
            var current = 0;
    
            $(window).load(function () {
                changesScreen();
                setGlobalPreferredLanguage();
                loadJCarousel();
                $('#loader-container').addClass('middle');  // transition-middle-effect
                setTimeout(function () {
                    $('#loader-container').addClass('inactive'); // end transition
                }, 1500);
            })
            $(window).on('resize', function () {
                changesScreen();
                reloadJCarousel();
            });
    
    
            // menu effect
            $(window).scroll(function () {
                launchItems();
    
                setTimeout(function () {
                    current = $(window).scrollTop();
                }, 1000);
    
                if ($(window).scrollTop() > current) { /* if scrolling down */
                    if ($(window).scrollTop() >= homeEndPos) {
                        header.css({ 'background': '#333333' });
                        header.removeAttr('style');
                        if ($(window).outerWidth() > 1110) {
                            header.add(navList).add(logoContainer).removeClass('fixed');
                        }
                        else {
                            header.add(logoContainer).add(smallMenu).removeClass('fixed');
                        }
                    }
                }
                else if ($(window).scrollTop() < current) { /* if scrolling up */
                    header.css({ 'background': '#333333' });
                    if ($(window).outerWidth() > 1110) { /* if not in small screen*/
                        header.add(navList).add(logoContainer).addClass('fixed');
                    }
                    else {
                        header.add(logoContainer).add(smallMenu).addClass('fixed');
                    }
    
                    if ($(window).scrollTop() <= (homeEndPos + 400)) {  /* if close to the home */
                        header.css({ 'background': 'transparent', 'height': 100 });
                    }
    
                }
            });
    
            $('#small-menu-container i').click(function () {
                navList.toggleClass('open');
            });
            
    
            // video-btn event
            $('.item-btn').click(function () {
                if ($(this).data('toggled') === 0) {
                    $(this).data('toggled', 1);
                    if (body.attr('data-lang') === 'pt') {
                        $(this).text('Ver menos');
                    }
                    else {
                        $(this).text('Hide');
                    }
                    $(this).siblings('.item-description').slideDown();
                }
                else {
                    $(this).data('toggled', 0);
                    if ($('body').attr('data-lang') === 'pt') {
                        $(this).text('Ver mais');
                    }
                    else {
                        $(this).text('Show');
                    }
                    $(this).siblings('.item-description').slideUp();
                }
            });
    
            $("#nav-list a[href*='#']").click(function (e) {
                e.preventDefault();
                var target = $.attr(this, 'href');
                if ($(target).length !== 0) {
                    $('html, body').animate({
                        scrollTop: $(target).position().top
                    }, 800);
                }
            })
    
    
            // animate 'skills' section
            function launchItems() {
                /*launch skills*/
                if ($(window).scrollTop() >= (skillsPos - 450)) {
                    $('#competencias > div').addClass('launched');
                }
                else {
                    $('#competencias > div').removeClass('launched');
                }
            }

    
            // refresh slider
            $('#nav-list li.lang span').on('click', function () {
                hobbiesContainer.css('display', 'none');    // 'delete' slider;
                hobbiesLoader.addClass('active');   // show loader
                $('.jcarousel').jcarousel('destroy');
    
                // using a timeout because the language change takes some time; otherwise it won't work; this is for 'static sliders'
                setTimeout(function () {
                    hobbiesLoader.removeClass('active');    // hide loader
                    hobbiesContainer.css('display', 'block');   // show slider
                    hobbiesContainer.css('display', 'block');
                    loadJCarousel();
                }, 1000);
            })
            

            function loadJCarousel() {
                $('.jcarousel').jcarousel({vertical: false, wrap: 'circular'}).jcarouselAutoscroll({
                    interval: 3000,
                    target: '+=1',
                    autostart: true
                });
            }

            function reloadJCarousel() {
                $('.jcarousel').on('jcarousel:create jcarousel:reload', function() {
                    var element = $(this),
                        width = element.innerWidth();
            
                    if( $(window).outerWidth() > 1190)
                    {
                        width = width / 4;
                    }
                        else if ( $(window).outerWidth() > 767) {
                        width = width / 3;
                    } 
                    else if( $(window).outerWidth() > 550 ) {
                        width = width / 2;
                    }
                    else {
                        width = width / 1;
                    }
            
                    element.jcarousel('items').css('width', width + 'px');
                });
            };


    
            function setGlobalPreferredLanguage() {
                var lang = $.cookie('NG_TRANSLATE_LANG_KEY');
                body.attr('data-lang', lang);
            };
    
            function changesScreen() {
                if ($(window).outerWidth() <= 1110) {
                    $('#copyright, #social-container').removeClass('vertical-centered');
                    $('#nav-list li a').each(function () {
                        if ($('i', this).length === 0) {
                            $(this).prepend('<i class="fa fa-arrow-right" aria-hidden="true"></i>');
                        }
                    })
                    navList.removeClass('fixed');
                    
                }
                else {
                    $('#nav-list li i').each(function () {
                        $(this).remove();
                    })
                    navList.addClass('fixed');
                    $('#copyright, #social-container').addClass('vertical-centered');
                }
            }    
    
    
        };
    
    })